<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOriginationRatesPost extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'rategroup' => 'required|string|max:50',
            'code' => 'required|string|max:50',
            'destination' => 'nullable|string|max:50',
            'country' => 'required|string|max:50',
            'status' => 'nullable|string|max:50',
            'connection_cost' => 'nullable',
            'cost_min' => 'nullable',
            'gracetime' => 'nullable|integer',
            'init_increment' => 'nullable',
            'increment' => 'nullable'
        ];
    }
}
