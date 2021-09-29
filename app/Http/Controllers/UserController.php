<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Todo;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userslist=User::paginate();
        return view('user.index',compact('userslist'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $preexist=user::where('email',$request->email)->count();
        if($preexist){
            return redirect()->back()->with(['error' => 'New already added.']);
        }
        $user =new User();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=$request->password;
        $user->save();
        return redirect()->back()->with(['success' => 'New user added successfully.']);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user =User::find($id);
        return view('user.edit',compact('user'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user =User::find($id);
        return view('user.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $user =User::find($id);
        $user->name=$request->name;
        $user->email=$request->email;
        if($request->password){
            $user->password=$request->password;
        }
        
        $user->save();
        return redirect()->back()->with(['success' => 'User details updated successfully.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        User::findOrFail($id)->delete();
        Todo::where('user_id',$id)->delete();
        return redirect()->back()->with(['success' => 'User deleted successfully.']);
    }
}
