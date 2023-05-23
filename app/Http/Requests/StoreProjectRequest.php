<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|unique:projects|string|max:100',
            'description' => 'required|string',
            'start_date' => 'required|date|after_or_equal:today',
            'end_date'  => 'date|nullable|after_or_equal:start_date', 
            'completed' => 'nullable',
            'created_by' => 'nullable|integer|min:0',
            'budget' => 'nullable|numeric|min:0',
            'image' => 'nullable|image|max:4000'        
        ];
    }
}
