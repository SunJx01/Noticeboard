<?php

namespace App\Http\Controllers;

use App\Models\group;
use App\Models\post;
use App\Models\usemanagement;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Storage;

class systemview extends Controller
{
    public function dashboardAdmin(Request $request){
        if(!session()->has('name')){
            return redirect('/');
        }
        $user_id = usemanagement::where('username', session('name'))->first()->id;
        $nav_btn = DB::table('group_members')
        ->where('group_members.user_id', $user_id)
        ->join('group', 'group.id', '=', 'group_members.group_id')
        ->select('group.group_name')
        ->get();

        $search = $request->input('search');
       
        if($search == ""){
            $datausers = usemanagement::whereNull('deleted_at')->where('role', "User")->get();
            $datamods = usemanagement::whereNull('deleted_at')->where('role', "Moderator")->get();

        }else{
            $datausers = usemanagement::where('username', 'LIKE', "%{$search}%")->where('role', "User")->whereNull('deleted_at')->get();
            $datamods    = usemanagement::where('username', 'LIKE', "%{$search}%")->where('role', "Moderator")->whereNull('deleted_at')->get();

        }
        
        $uId = usemanagement::where('username', session('name'))->first()->role;
        if($uId == "User"){
            return view('/dashboardUser', compact('nav_btn'));
        }
        if($uId == "Admin"){
            return view('/dashboardAdmin', compact('nav_btn', 'datausers', 'datamods'));
        }
        return view('/dashboardMod', compact('nav_btn'));

    }
    public function create_newgroup() {
        return view('components.newgroup');        
    }

 //-----------------------------------------------------------------------------------------------------------------------------------------------------
    public function posts(Request $request){
        
        $validateData = $request->validate([
            'title' => ['required'],
            'sub-title' => ['required'],
            'post-content' => ['required']            
        ]);
        
        $arrayData = [
            'key' => $request->post('title'),
            'another_key' => $request->post('sub-title'),
            'third_key' => $request->post('post-content')
        ];
        
        $jsonData = json_encode($arrayData);
        
        Storage::disk('local')->put($request->post('title').'-by-'.session('name').'.json', $jsonData);

        $post = new post();
        $post->post_name = $request->post('title').'-by-'.session('name').'.json';
        $post->posted_by = usemanagement::where('username', session('name'))->first()->id;
        $post->group_id = group::where('group_name', $request->post('grp'))->first()->id;
        $post->verified_by = session('name');
        $post->created_at = date('Y-m-d h:i:s');
        $post->updated_at = date('Y-m-d h:i:s');
        $post->save();

        return redirect()->back()->with('success', 'Post created successfully!');

    }
}
?>