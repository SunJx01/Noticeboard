<?php

namespace App\Http\Controllers;

use App\Models\group;
use App\Models\group_members;
use App\Models\post;
use App\Models\usemanagement;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Storage;

class navbar extends Controller
{
    
    public function settings(Request $request){
        if(!session()->has('name')){
            return redirect('/');
        }
        return view('settings');
          
    }
//-----------------------------------------------------------------------------------------------------------------------------------------------------
    
    public function logout(){
        
        if(session()->has('name')){
            session()->invalidate();
            return redirect('/');            
        }else {
            
            $data = "Login Timeout!";
            return redirect('/')->with('data', $data);
        }
    }

//-----------------------------------------------------------------------------------------------------------------------------------------------------

    public function noticepages($group_name)
    {
        if(!session()->has('name')){
            return redirect('/');            
        }
        $user_id = usemanagement::where('username', session('name'))->first()->id;
        $nav_btn = DB::table('group_members')
        ->where('group_members.user_id', $user_id)
        ->join('group', 'group.id', '=', 'group_members.group_id')
        ->select('group.group_name')
        ->get();

        $grp_id = group::where('group_name', $group_name)->first('id')->id;
        $member = DB::table('group_members')
        ->where('group_members.group_id', $grp_id)
        ->join('my_users', 'my_users.id', '=', 'group_members.user_id')
        ->select('my_users.username', 'my_users.role')
        ->get();


        $arrayData = []; 
        $files = Post::where('group_id', $grp_id)->orderBy('created_at', "desc")->get(); 
        
        foreach ($files as $file) {
            $author = [$file->verified_by, $file->created_at];
            if (Storage::disk('local')->exists($file->post_name)) {
                $jsonContents = Storage::disk('local')->get($file->post_name); 
                $decodedJson = json_decode($jsonContents, true); 
                
                if ($decodedJson !== null) {
                    $arrayData[] = $decodedJson;
                } else {
                }
            } else {
            }
        }
        
        if (empty($arrayData)) {
            $arrayData = ["No Posts Yet"];
            $author = [];
        }
        
        $uId = usemanagement::where('username', session('name'))->first()->role;
        if($uId == "User"){
            return view('noticepage_user', compact('group_name', 'nav_btn', 'member', 'arrayData', 'author'));
        }

        return view('noticepage_template', compact('group_name', 'nav_btn', 'member', 'arrayData', 'author'));  
    }
//-----------------------------------------------------------------------------------------------------------------------------------------------------
    //New group button component

    public function newgroup(){
        $error = "";
        return view('components.newgroup', compact('error'));
    }
    public function addnewgroup(Request $request){

        $data_arr_group=[
            'group_name'=>$request->post('group_name'),
            'created_by'=> session('name'),
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s')
        ];
        $validateData = $request->validate([
                'group_name' => ['required', 'unique:group,group_name'],
        ]);
        $data= group::create($data_arr_group);
    $user_id = usemanagement::where('username', session('name'))->first()->id;
    $group_id = group::where('group_name', $request->post('group_name'))->first()->id;
        $data_arr_group_members=[
            'user_id'=> $user_id,
            'group_id'=> $group_id,
            'added_by'=> session('name'),
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s')
        ];
        $data1= group_members::create($data_arr_group_members);

        return redirect('/dashboard');
    }

//-----------------------------------------------------------------------------------------------------------------------------------------------------
    //Add Member button component

    public function addmember(Request $request){
        
        $grpid = group::where('group_name', $request->post('grp'))->first()->id;
        $userid = usemanagement::where('username',$request->post('username'))->first()->id;
        $group_name = $request->post('grp');
        $data_arr_group_members=[
            'user_id'=> $userid,
            'group_id'=> $grpid,
            'added_by'=> session('name'),
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s')
        ];
        $data1= group_members::create($data_arr_group_members);

        return redirect("/noticepages/".$group_name);
    }

//-----------------------------------------------------------------------------------------------------------------------------------------------------


}
?>