<?php

namespace App\Http\Controllers\Backend;


use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;

use App\Models\User;

use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{

    public function __construct()
    {
        $this->returnUrl ="/users";
    }

   
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
        $user = new User();
        $data = $this->prepare($request,$user->getFillable());
        $user->fill($data);
       
       // $user->password = Hash ::make($user->password);
        $user->save();
        return Redirect::to($this->returnUrl);
    }
/**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user){
        return "show =>$user->user_id";
    }


    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        
        return view("backend.users.update_form",["user"=>$user]);

    }

    /**
     * Update the specified resource in storage.
     *
     *@param  UserRequest $request
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, User $user)
    {
        $data = $this->prepare($request,$user->getFillable());
        $user->fill($data);

        $user->save();

        return Redirect::to($this->returnUrl);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
       
        $user->delete();

        return response()->json(["message"=>"Done","id"=>$user->user_id]);
    }

    public function passwordForm(User $user){

        return view("backend.users.password_form",["user"=>$user]);
    }

    public function changePassword(User $user,UserRequest $request){
        
        $data = $this->prepare($request,$user->getFillable());
        $user->fill($data);
        $user->save();
        return Redirect::to($this->returnUrl);
    }
}
