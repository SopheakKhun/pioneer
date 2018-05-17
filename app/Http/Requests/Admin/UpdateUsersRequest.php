<?php
namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUsersRequest extends FormRequest
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
            
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$this->route('user'),
            'address' => 'required',
            'suburb' => 'required',
            'state' => 'required',
            'postcode' => 'max:2147483647|required|numeric',
            'phone' => 'max:2147483647|nullable|numeric',
            'mobile' => 'max:2147483647|required|numeric',
            'role' => 'required',
            'role.*' => 'exists:roles,id',
        ];
    }
}
