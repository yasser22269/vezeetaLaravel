<?php

namespace App\Http\Requests;

use App\Rules\UniqueCategoryName;
use Illuminate\Foundation\Http\FormRequest;

class DoctorRequest extends FormRequest
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
               'slug' => 'required|unique:doctors,slug,'. $this->id,
                "name" => 'required|string|max:100',
                "address" => 'required|string|max:100',
                "avatar" => 'required_without:id',
                "description" => 'required|string|max:1000',
                "short_description" => 'nullable|max:500',
                'category_id' => 'numeric|exists:categories,id',
                'tags' => 'array|min:1', //[]
                'tags.*' => 'numeric|exists:tags,id',
                'price' => 'required|min:0|numeric',

        ];
    }
}
