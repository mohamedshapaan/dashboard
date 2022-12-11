<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\project;
class ProjectController extends Controller
{
    public function index()
    {
       $select=project::select('id',
       'name',
       'serviceid',
       'image',
       'link',
       'desc')->get();
       return $select;
    }
    public function select($id)
    {
      project::find($id)->get();
    }
    public function create(Request $request) {
        $request->validate([
          'name' => 'required',
          'serviceid' => 'required',
          'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
          'link' => 'required',
          'desc' => 'required',          
        ]);
    
        $imageName = time() . '.' . $request->file->extension();
        // $request->image->move(public_path('images'), $imageName);
        $request->file->storeAs('public/images/project/', $imageName);
        $ProjectData= ['name' => $request->name,
         'serviceid' => $request->serviceid,
          'image' => $imageName,
          'link' => $request->link,
          'desc' => $request->desc
        ];
        project::create($ProjectData);
        return true;
      }

    public function destroy($id)
    {
        project::find($id)->delete();
          return true;
      }
    public function update($id, Request $request)
      {
          Validator::make($request->all(), [
            'name' => ['required'],
         'serviceid' => ['required'],
          'image' => ['required'],
          'link' => ['required'],
          'desc' => ['required'],
          ])->validate();
          $imageName = time() . '.' . $request->file->extension();
          $request->file->storeAs('public/images/project/', $imageName);
          $request->image=$imageName;
          project::find($id)->update($request->all());
          return true;
      }
}    

