<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Backend\UserRole;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Traits\Backend\FileUpload\FileUploadTrait;
class UserController extends Controller
{
        use FileUploadTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return view('backend.users.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['userRoles'] = UserRole::whereNotIn('id',[1])->get();
        return view('backend.users.add_new',$data);
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        if($request->password)
        {
            $request->validate([
                'name'      => 'required|string|max:150',
                'phone'     => 'required|string|max:15|unique:users,phone',
                'email'     => 'required|email|unique:users,email',
                'user_role_id'     => 'required',
                'password'  => 'required|string|min:6|confirmed',
                'password_confirmation' => 'required'
            ]);
        }
        $user                           = new User();
        $user->email                    = $request->email;
        $user->name                     = $request->name;
        $user->phone                    = $request->phone;
        $user->user_role_id             = $request->user_role_id;
        $user->status                   = 1;
        $user->send_user_notification   = $request->send_user_notification ?? 0;
        $user->password = Hash::make($request->password);
        $user->save();

        if(isset($request->photo))
        {
            $this->destination  = 'user';  //its mandatory
            $this->imageWidth   = 400;  //its mandatory
            $this->imageHeight  = 400;  //its nullable
            $this->requestFile  = $request->photo;  //its mandatory
            $user->photo = $this->storeImage();
            $user->save();
        }
        return redirect()->route('admin.user.index')->with('success','User added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
