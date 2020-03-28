<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAuthorPost extends FormRequest
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
    public function messages()
    {
        return [
            'name.required'=>'require yabni',
            'name.min'=>'Short than 4 ya3am',
            'name.unique'=>'name should be unique',
            'age.required'=>'el age matloob ya 3am',
            'age.integer'=>'anta btd7k 3laya ya3am da5al rakm',
            'books.required'=>'el books matloob ya 3am' 
            
        ];
    }
    public function rules()
    {
        return [
            'name' => 'required|unique:authors|min:4',
            'age' => 'required|integer',
            'books'=>'required|integer'
        ];
    }

 
}
