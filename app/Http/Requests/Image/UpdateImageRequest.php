<?php

namespace App\Http\Requests\Image;

use Illuminate\Foundation\Http\FormRequest;


class UpdateImageRequest extends FormRequest
{

    public function rules()
    {
        return [
            'filename' => 'required',
        ];
    }

    public function authorize()
    {
        return true;
    }
}
