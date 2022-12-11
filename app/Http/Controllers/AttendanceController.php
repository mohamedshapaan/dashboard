<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\attendance;
class AttendanceController extends Controller
{
    public function index()
    {
       $select=attendance::select('id',
                                'userid',
                                'date',
                                'signin',
                                'signout',
                                'userposition',
                                'latetime',)->get();
       return $select;
    }
}
