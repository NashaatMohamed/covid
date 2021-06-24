<?php

namespace App\Http\Controllers;

use App\Traits\GeneralTrait;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class login_controller extends Controller
{
    use GeneralTrait ;
    public function register(request $request)
    {
        $rules = [
            'name' => 'required|string',
            'email' => 'required|unique:users|string',
            'phoneNumber' => 'required|max:11|string',
            'password' => 'required|min:8|string',
            'confirmPassword' => 'required|min:8|string|same:password',
            'age'=>'required|numeric'
        ];
        $messages = [
            'name.required' => 'insert name',
            'email.unique' => 'الإيميل موجود بالفعل ',
            'phoneNumber.max' => 'رقم الهاتف لا يقل عن 11 رقم ',
            'password.required' => 'الباسورد مطلوب',
            'confirmPassword.required' => 'الباسورد مطلوب'
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return $validator->errors();
        } else {
            $user = User::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => bcrypt($request->input('password')),
                'confirmPassword'=>bcrypt($request->input('confirmPassword')),
                'phoneNumber' => $request->input('phoneNumber'),
                'age' => $request->input('age'),
            ]);

            return $this->returnData('user', $user, 'User registered successfully', 2001);
        }
    }
}
