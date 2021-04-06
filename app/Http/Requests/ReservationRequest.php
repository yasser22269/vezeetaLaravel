<?php

namespace App\Http\Requests;

use App\Rules\UniqueCategoryName;
use Illuminate\Foundation\Http\FormRequest;

class ReservationRequest extends FormRequest
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
                'doctor_id' => 'numeric|exists:doctors,id',
                "name" => 'required',
                 "phone" => 'required',
        ];
    }
}
