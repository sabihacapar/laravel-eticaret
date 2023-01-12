<?php

namespace App\Http\Controllers\Backend;


use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     
    * @return \Illuminate\Contracts\View\View

     */
    public function index()
    {

        $users = User::all();
        return view("backend.users.index",["users"=>$users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("backend.users.insert_form");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  UserRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $name =$request->get("name");
        $email =$request->get("email");
        $password =$request->get("password");
        $is_admin =$request->get("is_admin",0);
        $is_active =$request->get("is_active",0);


       

        $user = new User();
        $user->name = $name;
        $user->email = $email;
        $user->password = Hash::make($password);
        $user->is_admin = $is_admin;
        $user->is_active = $is_active;

        $user->save();
        return Redirect::to("/users");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return "show";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view("backend.users.update_form",["user"=>$user]);

    }

    /**
     * Update the specified resource in storage.
     *
     *@param  UserRequest $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        $name =$request->get("name");
        $email =$request->get("email");
        $is_admin =$request->get("is_admin",0);
        $is_active =$request->get("is_active",0);

        $user = User::find($id);

        $user->name = $name;
        $user->email = $email;
        $user->is_admin = $is_admin;
        $user->is_active = $is_active;

        $user->save();

        return Redirect::to("/users");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return Redirect::to("/users");
    }

    public function passwordForm(User $user){

        return view("backend.users.password_form",["user"=>$user]);
    }

    public function changePassword(User $user,UserRequest $request){
        

        $password =$request->get("password");

        $user->password = Hash::make($password);
        $user->save();
        return Redirect::to("/users");
    }
}
