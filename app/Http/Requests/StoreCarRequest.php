<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCarRequest extends FormRequest
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
            'model' => 'bail|required|string',
            'brand' => 'required|exists:brands,id',
            'category' => 'required|exists:categories,id',
            'pricing' =>'required|numeric',
            'desc_keys' => 'required|array|min:1',
            'desc_keys.*' => 'string',
            'desc_values' => 'required|array|min:1',
            'desc_values.*' => 'string',
            'description' => 'string',
            'photos' => 'required|array|min:2|max:10',
            'photos.*' => 'file|mimes:jpg,webp,png,svg',
        ];
    }
}
