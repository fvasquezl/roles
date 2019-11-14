<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'departments'=>['required'],
            'roles' =>['required'],
        ];
    }

    public function createUser($user)
    {

        $user->fill([
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password
        ]);

        $user->save();
        
        //Update Roles
        $user->roles()->sync($this->roles);
        
        //Update Departments
        $user->departments()->sync($this->departments);
        
        return $user;
    }
}
