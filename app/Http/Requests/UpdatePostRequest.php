<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
{
    public function rules()
    {
        return [
            'title' => 'required',
            'post_text' => 'required',
            'category_id' => 'required',
        ];
    }

    public function authorize()
    {
        return true;
    }
}
