<?php

namespace App\Http\Requests\Section;

use Illuminate\Foundation\Http\FormRequest;


class UpdateSectionRequest extends FormRequest
{

    public function rules()
    {
        return [
            'title' => 'required', 
            'identifier' => 'required', 
        ];
    }

    public function authorize()
    {
        return true;
    }
}
