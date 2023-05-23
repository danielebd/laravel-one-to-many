<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProjectRequest extends FormRequest
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

            'title' => [
                'required',
                'string',
                'max:100',
                Rule::unique('projects')->ignore($this->project)
            ],
            'description' => 'required|string',
            'start_date' => 'required|date',
            'end_date'  => 'date|nullable|after_or_equal:start_date',
            'completed' => 'nullable',
            'created_by' => 'nullable|integer|min:0',
            'budget' => 'nullable|numeric|min:0',
            'image' => 'nullable|image|max:4000',
            'switch' => 'boolean',
            'type_id' => 'nullable|exists:types,id'
        ];
    }
}
