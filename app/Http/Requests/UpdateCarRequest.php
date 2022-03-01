<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCarRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $user = $this->user();

        return $user && $user->is_admin;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'model' => 'bail|string',
            'brand' => 'exists:brands,id',
            'category' => 'exists:categories,id',
            'pricing' =>'numeric',
            'desc_keys' => 'array|min:1',
            'desc_keys.*' => 'string',
            'desc_values' => 'array|min:1',
            'desc_values.*' => 'string',
            'description' => 'string',
            'photos' => 'array|min:2|max:10',
            'photos.*' => 'file|mimes:jpg,webp,png,svg',
        ];
    }
}
