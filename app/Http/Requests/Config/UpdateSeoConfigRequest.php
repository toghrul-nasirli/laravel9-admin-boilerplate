<?php

namespace App\Http\Requests\Config;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSeoConfigRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'description' => ['nullable', 'string', 'max:255'],
            'keywords' => ['nullable', 'string', 'max:255'],
            'robots' => ['required', 'string', 'max:2048'],
        ];
    }

    public function attributes()
    {
        return [
            'description' => __('attributes.description'),
            'keywords' => __('attributes.description'),
            'robots' => __('attributes.robots'),
        ];
    }
}
