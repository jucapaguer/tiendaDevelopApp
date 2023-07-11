<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AdminController extends Controller
{
   
    public function __construct() {

        $this->middleware('auth');
    }

    function index(){

        return view('admin.dashboard');

    }

    function show($url, $url2){

        return view("admin.".$url.".".$url2);

    }
}
