<?php

namespace App\Http\Requests;

use App\Rules\UniqueCategoryName;
use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
         
            "name" => 'required|string|unique:categories,name,'.$this->id,
            // 'type' => 'required|in:1,2',
            'slug' => 'required|unique:categories,slug,'.$this->id,
            'parent_id' => 'required_if:type,==,2',

        ];
    }
}
