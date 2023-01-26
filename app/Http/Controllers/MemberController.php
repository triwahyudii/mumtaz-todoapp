<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;

class MemberController extends Controller
{
    public function index(){
        return view('show');
    }
 
    public function getMembers(){
        $members = Member::all();
 
        return view('show')->with('members', $members);
    }
 
    public function save(Request $request){
        $member = new Member;
        $member->fullname = $request->input('fullname');
        $member->description = $request->input('description');
        $member->save();
 
        return redirect('/');
    }
 
    public function update(Request $request, $id){
        $member = Member::find($id);
        $input = $request->all();
        $member->fill($input)->save();
 
        return redirect('/');
    }
 
    public function delete($id)
    {
        $members = Member::find($id);
        $members->delete();
  
        return redirect('/');
    }
}
