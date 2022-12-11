<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\service;
class ServiceController extends Controller
{
    public function index()
    {
       $select=service::select( 'id','name','image')->get();
       return $select;
    }
    public function select($id)
    {
        service::find($id)->get();
    }
    public function create(Request $request) {
        $request->validate([
          'name' => 'required',
          'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',       
        ]);
    
        $imageName = time() . '.' . $request->file->extension();
        // $request->image->move(public_path('images'), $imageName);
        $request->file->storeAs('public/images/project/', $imageName);
        $ProjectData= ['name' => $request->name,
          'image' => $imageName,
        ];
        service::create($ProjectData);
        return true;
      }

    public function destroy($id)
    {
        service::find($id)->delete();
          return true;
      }
      public function update($id, Request $request)
      {
          Validator::make($request->all(), [
            'name' => ['required'],
          'image' => ['required'],
          ])->validate();
          $imageName = time() . '.' . $request->file->extension();
          $request->file->storeAs('public/images/project/', $imageName);
          $request->image=$imageName;
          service::find($id)->update($request->all());
          return true;
      }
}
