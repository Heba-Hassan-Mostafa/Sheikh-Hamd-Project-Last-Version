<?php

namespace App\Http\Requests\Backend\Audioes;

use Illuminate\Foundation\Http\FormRequest;

class AudioCategoryRequest extends FormRequest
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
        switch ($this->method()) {
            case 'POST':
            {
                return [
                    'name'          => 'required|max:255|unique:audio_categories',
                    'status'        => 'required',
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'name'          => 'required|max:255',
                    'status'        => 'required',
                ];
            }
            default: break;
        }
    }


    public function messages()
{
    return [
        'name.required' => trans('validation.required'),
    ];
}
    }