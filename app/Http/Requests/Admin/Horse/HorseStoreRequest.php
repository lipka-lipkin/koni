<?php

namespace App\Http\Requests\Admin\Horse;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class HorseStoreRequest extends FormRequest
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
            'breed' => 'required|string',
            'color' => 'required|string',
            'age' => 'required|int|min:1|max:50',
            'riders' => 'nullable|array',
            'riders.*' => [
                'nullable',
                'integer',
                Rule::exists('riders', 'id')
            ],
            'owner' => [
                'nullable',
                'integer',
                Rule::exists('owners', 'id')
            ]
        ];
    }
}
