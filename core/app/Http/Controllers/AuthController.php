<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Tambahkan use statement untuk Auth
use Illuminate\Support\Facades\Validator; // Tambahkan use statement untuk Validator
use RealRashid\SweetAlert\Facades\Alert; // Tambahkan use statement untuk Alert

class AuthController extends Controller
{
    public function index(){

        return view('login.index');
         } 
    public function login (Request $request){
        $rules = [
                'username' => 'required|string|min:3',
                'password' => 'required|string'
        ];

        $messages = [
            'username.required' => 'Username harus diisi',
            'username.string' => 'Username tidak valid',
            'username.min' => 'Username minimal 3 karakter',
            'password.required' => 'Password harus diisi',
            'password.string' => 'Username tidak valid',

        ];
        $validator = Validator::make($request->all(), $rules, $messages); // karna vendor di keluarin dr folder core, biar ga berat filenya kalo dikirim ke github
        if ($validator->fails()){
            Alert::error('Login gagal', $validator->errors()->all());
            return redirect()->back();
        } 
        try{
            $data = [
                'username' => $request->username, 
                'password' => $request->password
            ];
            Auth::attempt($data);
            if (Auth::check()) { 
                //Login Success
                Alert::success('Login Berhasil', 'Selamat Bekerja '.Auth::user()->name."" );
                return redirect()->route('user.index');
                
            } else {
                //Login Fail
                Alert::error('Login Gagal', 'Username atau Password Anda Salah');
                return redirect()->route('login');
            }
        }
        catch(\Exception $e){
            Alert::error('Login gagal', $e->getMessage());
            return redirect()->route('login');
        }
    }
    public function logout(){
        try{
            Auth::logout();
            Alert::success('Logout Berhasil');
            return redirect()->route('login');
        }
        catch(\Exception $e){
            Alert::error('Logout Gagal', $e->getMessage());
            return redirect()->back();
        }
    }
}
