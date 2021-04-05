<?php

namespace App\Http\Requests;

use App\Rules\UniqueCategoryName;
use Illuminate\Foundation\Http\FormRequest;

class DoctorScheduleRequest extends FormRequest
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

                "scheduleDate" => 'required|date',
                "startTime" => 'required',
                "endTime" => 'required',
                'Doctors' => 'array|min:1', //[]
                'Doctors.*' => 'numeric|exists:doctors,id',
        ];
    }
}
