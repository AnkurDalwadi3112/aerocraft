<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use DB;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = DB::table('users')->get();
       return view('User.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
    
        $country_data = DB::table('country')->get();
       return view('User.create',compact("country_data"));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $img = $request->file('Photo');
        if(!empty($img) && $img->getClientOriginalName() !=""){
            $filename= $img->getClientOriginalName();
            $img->move(public_path('Admin'),$filename);
        }
        $request->validate([
            'Fname' => 'required|min:3|max:52',
            'Lname' => 'required|min:3|max:52',
            'email' => 'required|email|unique:users',
            'number' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'address' => 'required',
           
        ]);
        $userdata= [
             "Fname" => $request->Fname,
            "Lname" => $request->Lname,
            "email" => $request->email,
            "c_code" => $request->c_code,
            "number" => $request->number,
            "Address" => $request->Address,
            "Gender" => $request->Gender,
            "created_date" => date('Y-m-d'),
            "Hobby" =>implode(",",$request->Hobby),
            "Photo" =>(isset($filename) ? $filename : null),
        ];
        // dd($userdata);
        $user= User::create($userdata);
        return view('User.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $edit_users = User::find($id);
        $country_data = DB::table('country')->where('id',$edit_users->c_code)->get();
        return view('User.show',compact("country_data","edit_users"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit_users = User::find($id);
        $country_data = DB::table('country')->where('id',$edit_users->c_code)->get();
        return view('User.create',compact("country_data","edit_users"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $img = $request->file('Photo');
        if(!empty($img) && $img->getClientOriginalName() !=""){
            $filename= $img->getClientOriginalName();
            $img->move(public_path('Admin'),$filename);
        }
        $request->validate([
            'Fname' => 'required|min:3|max:52',
            'Lname' => 'required|min:3|max:52',
            'email' => 'required|email|unique:users',
            'number' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'address' => 'required',
           
        ]);
        $user= User::find($id);
        $user->Fname = $request->Fname;
         $user->Lname = $request->Lname;
         $user->email = $request->email;
         $user->c_code = $request->c_code;
         $user->number = $request->number;
         $user->Address = $request->Address;
         $user->Gender = $request->Gender;
         $user->Hobby = implode(",",$request->Hobby);
        if(isset($filename)){ $user->photo = $filename ; }
        $user->save();    
    
        // dd($userdata);
       
        return view('User.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $user= User::find($id)->delete();
        return view('User.index');
    }
}
