<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBlogPostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
        'title' => 'required|unique|max:255',
        'body' => 'required',
		'password' => 'required|max:255'
		'email'=> 'required|email|unique:users|max:255'
    ];
	public function store(StoreBlogPostRequest $request)
{
    // Валидация успешно пройдена
}
    }
}
