<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFeedbackRequest extends FormRequest
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
            'teacher_id' => ['required', 'exists:users,id'],
            'subject_id' => ['required', 'exists:subjects,id'],
            'rating'     => ['required', 'numeric', 'min:0', 'max:5'],
        ];
    }

    public function messages(): array
    {
        return [
            'teacher_id.exists' => "The selected teacher does not exist.",
            'subject_id.exists' => "The selected subject does not exist.",
            'rating.max' => "The rating value cannot be more than 5.",
            'rating.min' => "The rating value must be at least 0.",
            'rating.numeric' => "The rating value must be a number.",
            'rating.required' => "The rating value is required.",
        ];
    }
}
