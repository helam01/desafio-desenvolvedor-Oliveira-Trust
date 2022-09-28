<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class SellRequest extends FormRequest
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
            'client_id' => 'trim|strip_tags',
            'products' => 'trim|strip_tags',
            'sell_date' => 'trim|strip_tags',
            'total_amount' => 'trim|strip_tags',
        ];
    }

    protected function prepareForValidation()
    {
        $date_parts = explode(' ', $this->sell_date);
        $date =  implode('-',array_reverse(explode('/',$date_parts[0])));
        $time = empty($date_parts[1]) ? '' : $date_parts[1];

        $this->merge([
            'client_id' => $this->client,
            'sell_date' => $date.' '.$time,
            'total_amount' => str_replace(',','.', $this->total_amount),
        ]);

        unset($this->client);
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
            'client_id' => 'required|numeric',
            'products' => 'required',
            'sell_date' => 'required|date_format:Y-m-d H:i',
            'total_amount' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'sell_date.date_format' => 'The sell_date does not match the format dd/mm/yyyy hh:mm',
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
