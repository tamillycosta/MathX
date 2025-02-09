<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest

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
            'operations' => 'required|array|min:1', // Pelo menos um checkbox marcado
            'operations.*' => 'in:Sum,Subtraction,Multiplication,Division', // Valores válidos
            'number_one' => 'required|integer|min:0|max:100|lt:number_two',
            'number_two' => 'required|integer|min:0|max:100',   
            'number_exercises'  => 'required|integer|min:5|max:50',
            'operators' => 'required|integer|min:2|max:100'
        ];
        
           
    }
    
}
