<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class admincontroller extends Controller
{
    public function admin()
    {
        return view('admin.main');
    }
}
