<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash; 

class UserController extends Controller
{
    public function index(){
        $datas = User::get();
        return view('user.index', compact('datas'));

         } 
         
    public function create(){
        return view('user.create');
    }

    public function store(request $request){
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|unique:users,username',
            'password' => 'required|string|min:2',
        ]);
        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'password' => Hash::make($request->password)
        ]);
        return redirect()->route('user.index')->with('success', 'User berhasil dibuat!');
    }
    public function edit($id){
        $user = User::where('id',$id)->firstOrFail();
        return view('user.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        try{
           $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'unique:users,username,'.$id
        ]); 
        User::where('id',$id)->firstOrFail()->update([ //returns the first record found in the database. If no matching model exist, it throws an error
            'name'=>$request->name,
            'username'=>$request->username,
            'password'=>Hash::make($request->password)
        ]);
        return redirect()->route('user.index');
        }
        catch(\Exception $e){
            dd($e);
        }
    }

    public function destroy($id)
    {
        $user = User::where('id',$id)->firstOrFail();
        $user->delete();

        return redirect()->route('user.index')->with('success', 'User berhasil dihapus');
    }
    public function role(){
            return view('user.role');
    }
}
