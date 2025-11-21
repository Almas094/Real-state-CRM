<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // Allow all authenticated users (or add your logic)
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        $id = $this->route('id'); // useful for edit/update

        return [
            'role_id'   => 'required|integer|exists:roles,id',
            'name'      => 'required|string|max:100',
            'email'     => 'required|email|max:100|unique:users,email,' . $id,
            'phone'     => 'required|numeric|digits:10',
            'address'   => 'required|string|max:255',
            'image'     => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'password'  => 'required|min:6|same:confirm_password',
            'confirm_password' => 'required|min:6',
            'status'    => 'required|in:active,inactive',
        ];
    }

    public function messages(): array
    {
        return [
            'role_id.required' => 'Please select a role.',
            'email.unique'     => 'This email is already in use.',
            'password.same'    => 'Password and Confirm Password must match.',
            'image.image'      => 'Only image files are allowed.',
        ];
    }

}
