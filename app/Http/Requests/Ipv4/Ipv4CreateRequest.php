<?php

namespace App\Http\Requests\Ipv4;

use App\Http\Requests\BaseFormRequest;

class Ipv4CreateRequest extends BaseFormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'ipv4' => 'required|ipv4|unique:ipv4s,ipv4',
            'comment' => 'required|string',
        ];
    }
}
