<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use App\Models\User;

use App\Models\TodoItem;
use Illuminate\Support\Facades\Storage;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alltodo=Todo::with('user')->paginate();
        
        return view('todo.index',compact('alltodo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $userslist=User::get();
        return view('todo.create',compact('userslist'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newtodo=new Todo();
        $newtodo->user_id=$request->user_id;
        $newtodo->todo_name=$request->todo_name;
        $newtodo->description=$request->description;
        $newtodo->estimated_delivery_time=$request->estimated_delivery_time;
        
        $images=[];
        if ($request->hasFile('photos')) {
            foreach ($request->photos as $key => $photo) {
                $path = $photo->store('event_images', 'public');
                $image_url= url(Storage::url($path));
                array_push($images,$image_url);
            }
        }
        $newtodo->attachments=json_encode($images);
        $newtodo->save();
        return redirect()->back()->with(['success' => 'New todo added successfully.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $todo=Todo::with('user')->find($id);
        
        return view('todo.show',compact('todo'));

        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $todo=Todo::find($id);
        $todo->estimated_delivery_time=date("Y-m-d", strtotime($todo->estimated_delivery_time) );
        
        $userslist=User::get();
        return view('todo.edit',compact('todo','userslist'));

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
        $newtodo=Todo::find($id);
        $newtodo->user_id=$request->user_id;
        $newtodo->todo_name=$request->todo_name;
        $newtodo->description=$request->description;
        $newtodo->estimated_delivery_time=$request->estimated_delivery_time;
        $newtodo->status=$request->status;
        $images=[];
        if ($request->hasFile('photos')) {
            foreach ($request->photos as $key => $photo) {
                $path = $photo->store('event_images', 'public');
                $image_url= url(Storage::url($path));
                array_push($images,$image_url);
            }
        }
        if(sizeof($images)>1){
            $newtodo->attachments=json_encode($images);
        }
        
        $newtodo->save();
        return redirect()->back()->with(['success' => ' Todo updated successfully.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Todo::find($id)->delete();
        return redirect()->back()->with(['success' => ' Todo deleted successfully.']);

    }
}
