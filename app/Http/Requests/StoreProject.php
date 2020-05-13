<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProject extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'project_name' => 'required' | 'max:255',
            'description' => 'required' | 'max:255',
            'status_id' => 'required' | 'max:255',
            'members_id' => 'required' | 'max:255',
            'began_at' => 'required|date',
            'finished_at' => 'required|date|after_or_equal:began_at',
        ];
    }
}
