<?php

namespace App\Http\Requests\Image;

use Illuminate\Foundation\Http\FormRequest;

class DeleteImageRequest extends FormRequest
{

    public function rules()
    {
        return [];
    }

    public function authorize()
    {
        return true;
    }
}
