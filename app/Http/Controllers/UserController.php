<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::All();
        return view('users.index')->with(['users' =>$users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        //dd($request->all());
        $user = new User;
        $user->name = $request -> name;
        $user->lastname = $request -> lastname;
        $user->document = $request -> document;
        $user->address =$request ->address;
        $user->phone = $request ->phone;
        $user->email = $request ->email;
        $user->password =$request -> password;
        $user->role = $request -> role;
        
        if ($user->save()){
            return redirect ('users')->with('messages', 'El usuario;'. $user->name. ' ¡fue creado!');
        }

        $user -> photo = $request ?? 'img/.png';
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
       
        return ['user' => $user];
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, User $user)
    {
        $user->name = $request -> nameEdit;
        $user->lastname = $request -> lastnameEdit;
        $user->document = $request -> documentEdit;
        $user->address =$request ->addressEdit;
        $user->phone = $request ->phoneEdit;
        $user->email = $request ->emailEdit;
        //$user->password =$request -> passwordEdit;
        $user->role = $request -> roleEdit;
        if ($user->save()){
            return redirect ('users')->with('messages', 'El usuario;'. $user->name. ' ¡fue creado!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        if($user->delete()){
            return redirect('users')->with('messages', 'El usuario:'.$user->name.' ¡Fue eliminado!');
        }
    }

    public function search(Request $request)
    {
        $users= User::names($request->q)->paginate(20);
        return view('users.search')->with(['users'=>$users]);
    }

}
