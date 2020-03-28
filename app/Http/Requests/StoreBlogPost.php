<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBlogPost extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'title'=>'required|unique:blogs',
            'body'=>'required|min:10|max:70',
        ];
    }

    public function messages()
    {
        return [
            'title.required'=>'require yabni',
            'body.required'=>'we di kaman ya3am',
        ];
    }
}
