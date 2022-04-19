<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ExpenseCategory;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;

class ExpenseCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $all = ExpenseCategory::where('expcate_status',1)->orderBy('expcate_id','DESC')->get();
        return view('admin.Expense Category.index', compact('all'));
    }

    public function create(){
        return view('admin.Expense Category.create');
    }

    public function store(Request $request){
        $this->validate($request,[
            'expcate_code' => ['required', 'integer'],
            'expcate_name' => ['required', 'string'],
        ],[
            'expcate_code.required' => 'Please enter Expense Code',
            'expcate_name.required' => 'Please enter The Expense Name',
        ]);

        $slug = Str::slug($request->expcate_name);
        $creator = Auth::user()->id;
        $insert = ExpenseCategory::insertGetId([
            'expcate_code' => $request['expcate_code'],
            'expcate_name' => $request['expcate_name'],
            'expcate_remarks' => $request['expcate_remarks'],
            'expcate_slug' => $slug,
            'expcate_creator' => $creator,
            'expcate_status' => 1,
            'created_at' => Carbon::now()->toDateTimeString(),
        ]);

        if($insert){
            Session::flash('success','Successfully Insert Expense Category');
            return redirect()->back();
        }else{
            Session::flash('error','Opps! Failed To insert.');
            return redirect()->back();
        }
    }

    public function edit($slug){
        $data = ExpenseCategory::where('expcate_status',1)->where('expcate_slug',$slug)->firstOrFail();
        return view('admin.Expense Category.edit', compact('data'));
    }

    public function update(Request $request){
        dd($request->all());
        $this->validate($request,[
            'expcate_code' => ['required', 'integer'],
            'expcate_name' => ['required', 'string'],
        ],[
            'expcate_code.required' => 'Please enter Expense Code',
            'expcate_name.required' => 'Please enter The Expense Name',
        ]);
        $id = $request['expcate_id'];
        $slug = Str::slug($request->expcate_name);
        $editor = Auth::user()->id;
        $update = ExpenseCategory::where('expcate_id',$id)->update([
            'expcate_code' => $request['expcate_code'],
            'expcate_name' => $request['expcate_name'],
            'expcate_remarks' => $request['expcate_remarks'],
            'expcate_slug' => $slug,
            'expcate_editor' => $editor,
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);

        if($update){
            Session::flash('success','Successfully Insert Expense Category');
            return redirect( route('expense.category.index') );
        }else{
            Session::flash('error','Opps! Failed To insert.');
            return redirect()->back();
        }
    }

    public function softdelete(){
        $id = $_POST['modal_id'];
        $soft = ExpenseCategory::where('expcate_status',1)->where('expcate_id',$id)->update([
            'expcate_status' => 0,
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);

        if($soft){
            Session::flash('success','Successfully Delete Expense Category');
            return redirect( route('expense.category.index') );
        }else{
            Session::flash('error','Opps! Failed To Delete.');
            return redirect()->back();
        }
    }
}
