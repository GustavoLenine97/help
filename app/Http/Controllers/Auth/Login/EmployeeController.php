<?php

namespace App\Http\Controllers\Auth\Login;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController as DefaultLoginController;
use App\Models\Employee;
use App\Models\Usuario;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends DefaultLoginController
{
    protected $redirectTo = RouteServiceProvider::HOME;
    
    public function __construct()
    {
        $this->middleware('guest:employee')->except('logout');
    }

    public function showLoginForm()
    {
        return view('auth.login.employee');
    }

    public function username()
    {
        return 'employee_id';
    }
    
    protected function guard()
    {
        return Auth::guard('employee');
    }

    public function llogin(Request $request){
        //var_dump($request->all());

        $credentials = [
            'employee_id' => $request->employee_id,
            'password' => $request->employee_password
        ];

        $users = Employee::where('employee_id', $credentials['employee_id'])->first();

        //echo $users->employee_password;

        if($users){
            if($credentials['password'] == $users->employee_password){
                if(Auth::attempt($credentials)){
                    echo 'Logado';
                }else {
                    $users = $credentials;
                    return view('home',['users' => $users]);
                }
                
                //return view('home');
            }else {
                echo 'Usuário não encontrado';
            }
        }

        //if(Auth::attempt($credentials)){
        //   echo 'Logado';
        //}
        //else {
        //   echo 'Não';
        //} 

        //return redirect()->back()->withInput()->withErros(['Os dados informados não conferem']);
    }

    protected function create(array $data)
    {
        return Employee::create([
            'employee_id' => $data['employee_id'],
            'employee_password' => Hash::make($data['employee_password']),
        ]);
    }
}
