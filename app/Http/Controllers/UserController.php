<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    //register
    public function createUser(Request $request){
        $newUSer = new User();

        $first_name = $request->firstName;
        $email = $request->email;
        $gender_id = $request->optionGender;
        $password = $request->password;
        $last_name = $request->lastName;
        $role_id = $request->role;
        $confirmPassword = $request->confirmPassword;

        $validation = [
            'firstName' => 'required | alpha | max:25',
            'lastName' => 'required | alpha | max:25',
            'email' => 'required | email | unique:users,email',
            'role' => 'required',
            'optionGender' => 'required',
            'displayPicture' => 'required | mimes:jpg,jpeg,png',
            'password' => 'required | min:8 | regex:/^(?=.*[0-9]).+$/ | same:confirmPassword',
            'confirmPassword' => 'required | min:8',
        ];

        $messages = [
            'password.regex' => 'Password must contain at least 1 number',
         ];

        $validator = Validator::make($request->all(), $validation, $messages);

        if ($validator->fails()) {
            $errors = $validator->errors();
            return redirect()->back()->withInput()->withErrors($errors);
        }

        $file = $request->file('displayPicture');
        $imageName = time().'.'.$file->getClientOriginalExtension();
        Storage::putFileAs('public/images', $file, $imageName);

        $newUSer->display_picture_link = $imageName;
        $newUSer->first_name = $first_name;
        $newUSer->email = $email;
        $newUSer->gender_id = $gender_id;
        $newUSer->password = bcrypt($password);
        $newUSer->last_name = $last_name;
        $newUSer->role_id = $role_id;

        $newUSer->save();

        return redirect('/login')->with('success', 'You have successfully registered!');;
    }

    //login authentication
    public function loginAuth(Request $request){
        $user = User::where('email', '=', $request->email)->get()->first();

        $validation = [
            'email' => 'required | email',
            'password' => 'required'
        ];

        $validator = Validator::make($request->all(), $validation);

        if ($validator->fails()) {
            $errors = $validator->errors();
            return redirect()->back()->withInput()->withErrors($errors);
        }

        if($user == null){
            $errMsg = "Email not found!";
            return redirect()->back()->withErrors(['errMsg' => $errMsg]);
        }

        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        $remember = true;

        if(Auth::attempt($credentials, $remember)){
            return redirect('/home');
        }else{
            $errMsg = "Password is incorrect!";
            return redirect()->back()->withErrors(['errMsg' => $errMsg]);
        }
    }

    public function logout(){
        Auth::logout();
        return view('contents.logout');
    }

    public function accountMaintenance(){
        $user = User::all();
        return view('contents.acc-maintenance', ['user' => $user]) ;
    }

    public function deleteUserAdmin(Request $request){
        $user = User::find($request->id);
        $user->delete();
        return redirect('/accountMaintenance');
    }

    public function updateRolePage(Request $request){
        $user = User::find($request->id);
        return view('contents.update-role', ['user' => $user]) ;
    }

    public function updateRole(Request $request, $id){

        $role = $request->role;

        $user = User::find($request->id);
        $user->role_id = $role;
        $user->save();

        return redirect('/home')->with('success', 'Role updated successfully!');
    }

    public function profilePage(){
        $user = User::find(Auth::user()->id);
        return view('contents.profile', ['user' => $user]) ;
    }

    public function updateProfile(Request $request){

        $updateUser = User::find(Auth::user()->id);

        $first_name = $request->firstName;
        $email = $request->email;
        $gender_id = $request->optionGender;
        $password = $request->password;
        $last_name = $request->lastName;
        $role_id = $request->role;
        $confirmPassword = $request->confirmPassword;

        $validation = [
            'firstName' => 'required | alpha | max:25',
            'lastName' => 'required | alpha | max:25',
            'email' => 'required | email | unique:users,email',
            'role' => 'required',
            'optionGender' => 'required',
            'displayPicture' => 'required | mimes:jpg,jpeg,png',
            'password' => 'required | min:8 | regex:/^(?=.*[0-9]).+$/ | same:confirmPassword',
            'confirmPassword' => 'required | min:8',
        ];

        $messages = [
            'password.regex' => 'Password must contain at least 1 number',
         ];

        $validator = Validator::make($request->all(), $validation, $messages);

        if ($validator->fails()) {
            $errors = $validator->errors();
            return redirect()->back()->withInput()->withErrors($errors);
        }

        $file = $request->file('displayPicture');
        $imageName = time().'.'.$file->getClientOriginalExtension();
        Storage::putFileAs('public/images', $file, $imageName);

        $updateUser->display_picture_link = $imageName;
        $updateUser->first_name = $first_name;
        $updateUser->email = $email;
        $updateUser->gender_id = $gender_id;
        $updateUser->password = bcrypt($password);
        $updateUser->last_name = $last_name;
        $updateUser->role_id = $role_id;

        $updateUser->save();

        return redirect('/home')->with('success', 'Role updated successfully!');
    }

}
