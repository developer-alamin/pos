<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RepairsController extends Controller
{
    public function manage()
    {
    	return view("backend.Manage.manage");
    }
}
