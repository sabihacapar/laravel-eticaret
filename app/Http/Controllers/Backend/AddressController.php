<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddressRequest;
use App\Models\Address;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AddressController extends Controller
{
    public function __construct()
    {
        $this->returnUrl ="/users/{}/addresses";
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * @return View
     */
    public function index(User $user)
    {
    
        $addrs =$user->addrs;
        return view("backend.addresses.index",["addrs"=>$addrs,"user"=>$user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(User $user)
    {
        return view("backend.addresses.insert_form",["user"=>$user]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(User $user,AddressRequest $request)
    {
        $addr = new Address();
        $data = $this->prepare($request,$addr->getFillable());
        $addr->fill($data);
       
        $addr->save();


        $this->editReturnUrl($user->user_id);
        return Redirect::to($this->returnUrl);
    }

    /**
     * Display the specified resource.
     *
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user,Address $address)
    {
        return view("backend.addresses.update_form",["user"=>$user,"addr"=>$address]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  User $user
     *@param Address $address
     * @return \Illuminate\Http\Response
     */
    public function update(AddressRequest $request, User $user,Address $address)
    {
        $data = $this->prepare($request,$address->getFillable());
        $address->fill($data);

        
       $address->save();

       $this->editReturnUrl($user->user_id);

       return Redirect::to($this->returnUrl);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Address $address)
    {
        $address->delete();
        return response()->json(["message"=>"Done","id"=>$address->address_id]);
    }

    private function editReturnUrl($id){

     $this->returnUrl ="/users/$id/addresses";
    }
}
