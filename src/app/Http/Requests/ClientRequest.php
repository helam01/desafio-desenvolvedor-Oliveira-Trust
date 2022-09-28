<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class ClientRequest extends FormRequest
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
            'document' => 'trim|strip_tags',
            'email' => 'trim|strip_tags',
            'birthdate' => 'trim|strip_tags',
            'address_street' => 'trim|strip_tags',
            'address_number' => 'trim|strip_tags',
            'address_complement' => 'trim|strip_tags',
            'address_zipcode' => 'trim|strip_tags',
            'address_neighborhood' => 'trim|strip_tags',
            'address_city' => 'trim|strip_tags',
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'birthdate' => implode('-',array_reverse(explode('/',$this->birthdate))),
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
            'document' => 'required|string',
            'email' => 'required|email',
            'birthdate' => 'required|date_format:Y-m-d',
            'address_street' => 'required|string',
            'address_number' => 'required|string',
            'address_zipcode' => 'required|string',
            'address_neighborhood' => 'required|string',
            'address_city' => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'birthdate.date_format' => 'The birthdate does not match the format dd/mm/yyyy',
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
