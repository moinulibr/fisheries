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
    public function index($uty = NULL)
    {
        $user_role_id = NULL;
        if(strtolower($uty) == 'administrator'){
            $user_role_id = 1;
        }
        else if(strtolower($uty) == 'author'){
            $user_role_id = 2;
        } 
        else if(strtolower($uty) == 'contributor'){
            $user_role_id = 3;
        }else if(strtolower($uty) == 'editor'){
            $user_role_id = 4;
        }
        $query = User::query();
        if($user_role_id)
        {
            $query->where('user_role_id',$user_role_id);
        }
        $data['users']          = $query->whereNull('deleted_at')->where('status',1)->latest()->get();
        $data['userCountables'] = User::whereNull('deleted_at')->where('status',1)->get();
        $data['utyUrl']         = $uty;
       return view('backend.users.index',$data);
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
        $data['userRoles'] = UserRole::whereNotIn('id',[1])->get();
        $data['user'] = $user;
        return view('backend.users.show',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $data['userRoles'] = UserRole::whereNotIn('id',[1])->get();
        $data['user'] = $user;
        return view('backend.users.edit',$data);
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
        $request->validate([
            'name'      => 'required|string|max:150',
            'phone'     => 'required|string|max:15|unique:users,phone,'.$user->id,
            'user_role_id'     => 'required',
        ]);

        if($request->password)
        {
            $request->validate([
                //'email'     => 'required|email|unique:users,email',
                'password'  => 'required|string|min:6|confirmed',
                'password_confirmation' => 'required'
            ]);
        }
        //$user->email                    = $request->email;
        $user->name                     = $request->name;
        $user->phone                    = $request->phone;
        $user->user_role_id             = $request->user_role_id;
        $user->status                   = 1;
        $user->send_user_notification   = $request->send_user_notification ?? 0;
        if($request->password)
        {
            $user->password = Hash::make($request->password);
        }
        $user->save();

        if(isset($request->photo))
        {
            $this->destination  = 'user';  //its mandatory
            $this->imageWidth   = 400;  //its mandatory
            $this->imageHeight  = 400;  //its nullable
            $this->requestFile  = $request->photo;  //its mandatory
            $this->dbImageField = $user->photo; 
            $user->photo = $this->updateImage();;       //its mandatory
            $user->save();
        }
        return redirect()->route('admin.user.index')->with('success','User updated successfully');
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Backend\User  $user
     * @return \Illuminate\Http\Response
     */
    public function bulkDestroy(Request $request)
    {
        User::whereIn('id',$request->ids)->update([
            'deleted_at' => date('Y/m/d h:i:s'),
            'status'    => 0
        ]);
        return response()->json([
            'status' => true,
            'mess' => "User Deleted Successfully"
        ]);
    }


    public function delete(User $user)
    {
        $data['user'] = $user;
        $view =  view('backend.users.delete',$data)->render();
        return response()->json([
            'status' => true,
            'html' => $view
        ]);
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->deleted_at   = date('Y/m/d h:i:s');
        $user->status       = 0;
        $user->save();
        return redirect()->route('admin.user.index')->with('success','User Deleted Successfully');
    }
}
