<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Carbon;
use App\Models\User;
use Illuminate\Validation\Rules;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;

class UserController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $all = User::where('status',1)->orderBy('id','DESC')->get();
        return view('admin.user.all', compact('all'));
    }

    public function add(){
        return view('admin.user.add');
    }
}
