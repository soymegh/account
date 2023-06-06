<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRateGroupPost extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:50',
            'status' => 'nullable|string|max:50',
            'markup' => 'nullable|integer',
            'init_increment' => 'required',
            'increment' => 'required'
        ];
    }
}
