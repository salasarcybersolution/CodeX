<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BankRequest extends FormRequest
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
            'bank' => ['required'],
            'ac_no' => ['required'],
            'ifsc_code' => ['required'],
            'micr' => ['required'],
            'address' => ['required'],
            'phone' => ['required'],
            'fax' => ['required'],
            'email' => ['required'],            
            'remark' => ['required'],
            'contact_person' => ['required'],
            'mobile' => ['required'],
            'designation' => ['required'],
            'status' => ['required']
        ];
    }
}
