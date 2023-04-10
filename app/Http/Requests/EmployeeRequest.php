<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
    protected function prepareForValidation()
    {
//        $this->merge([
//
//            'slug' => preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $this->name)).'-'.Str::random(5)
//        ]);

    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'first_name'=>'required|string',
            'last_name'=>'required|string',
            'email'=>'nullable|email',
            'phone'=>'nullable|string|min:6',
            'company_id'=>'required|exists:companies,id',
        ];
    }
}
