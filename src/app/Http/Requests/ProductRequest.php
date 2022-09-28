<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class ProductRequest extends FormRequest
{
    protected $stopOnFirstFailure = true;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function filters(): array
    {
        return [
            'code' => 'trim|strip_tags',
            'name' => 'trim|strip_tags',
            'amount' => 'trim|strip_tags',
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'amount' => str_replace(',','.', $this->amount),
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'code' => 'required|string',
            'name' => 'required|string',
            'amount' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            //'amount.numeric' => 'The birthdate does not match the format dd/mm/yyyy',
        ];
    }


    public function failedValidation($validator)
    {
        throw new HttpResponseException(
            response()->json([
              'status' => false,
              'messages' => $validator->errors()->all()
            ], 400)
          );
    }
}
