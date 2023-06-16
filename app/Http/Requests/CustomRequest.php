<?php

namespace App\Http\Requests;

use App\Rules\BirthdayRule;
use Illuminate\Foundation\Http\FormRequest;

class CustomRequest extends FormRequest
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
                'name'=>'required|max:10',
                'email'=>'required|email',
                'dob'=>['required', new BirthdayRule],
                'subject'=>'required',
                'message'=>'required',
            ];
    }
    public function messages()
    {
        return [
            'name.required' => 'A nice name is required for this message.',
            'name.max' => 'Name should be less than 10',
            'email.required' => 'Please add an Email',
            'email.email' => 'Please add a valid email address.',
            'dob.required' => 'Please add a Date of Birth.',
            'subject.required' => 'Please add a subject.',
            'message.required' => 'Please add a message.',
        ];
    }
}
