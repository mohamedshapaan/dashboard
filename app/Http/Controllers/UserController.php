<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
App\Models\users;
class UserController extends Controller
{
    public function index()
    {
       $select=users::select('id',
       'name',
       'email',
       'position',
       'type',
       'phone',
       'image',)->get();
       return $select;
    }
    public function select($id)
    {
        users::find($id)->get();
    }
    public function create(Request $request) {
        $request->validate([
          'name' => 'required',
          'email' => 'required',
          'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
          'position' => 'required',
          'type' => 'required',          
          'phone' => 'required',          
        ]);
    
        $imageName = time() . '.' . $request->file->extension();
        // $request->image->move(public_path('images'), $imageName);
        $request->file->storeAs('public/images/project/', $imageName);
        $ProjectData= ['name' => $request->name,
         'email' => $request->email,
          'image' => $imageName,
          'position' => $request->position,
          'phone' => $request->phone,
          'type' => $request->type
        ];
        users::create($ProjectData);
        return true;
      }

    public function destroy($id)
    {
        users::find($id)->delete();
          return true;
      }
    public function update($id, Request $request)
      {
          Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'position' => 'required',
            'type' => 'required',          
            'phone' => 'required', 
          ])->validate();
          $imageName = time() . '.' . $request->file->extension();
          $request->file->storeAs('public/images/project/', $imageName);
          $request->image=$imageName;
          project::find($id)->update($request->all());
          return true;
      }
}
