<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Storeproject extends FormRequest
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
            'project_name' => 'required',
            'description' => 'required',
            'status_id' => 'required',
            'member_id' => 'required',
            'customer_id' => 'required',
            'began_at' => 'required|date',
            'finished_at' => 'required|date',
        ];
    }
}
