<?php

namespace App\Http\Controllers;

use App\Models\profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    public function usersubmit(Request $request)
    {
        $obj= new profile;

        $obj->usertype=$request->usertype;
        $obj->name=$request->name;
        $obj->email=$request->email;
        $obj->mobile=$request->mobile;
        $obj->password=$request->password;
        $obj->address=$request->address;

        $obj->save();
        $request->session()->flash('msg','Data Inserted Succesfully!!');
        return redirect('home');
    }
    ///for admin add user
    public function adminsubmit(Request $request)
    {
        $obj= new profile;

        $obj->usertype=$request->usertype;
        $obj->name=$request->name;
        $obj->email=$request->email;
        $obj->mobile=$request->mobile;
        $obj->password=$request->password;
        $obj->address=$request->address;

        $obj->save();
        $request->session()->flash('msg','Data Inserted Succesfully!!');
        return redirect('adminindex');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\profile  $profile
     * @return \Illuminate\Http\Response
     */



   
    public function adminshow(profile $profile)
    {
        $data = profile::where('usertype',"byadmin")
        ->get();
        //dd("$data");
        return view('admin/userbyadmin',compact("data"));
       // return view('admin/userbyadmin')->with('data',profile::all());
    }

    public function showall(profile $profile)
    {
        $data = profile::where('usertype',"byadmin")
        ->orwhere('usertype',"byuser")
        ->get();
        //dd("$data");
        return view('admin/alluser',compact("data"));
    
    }

    //login
    public function loginsubmit(Request $request,profile $profile)
    {
        $input = $request->all();
        $em=$request->input('email');
        $db= profile::where('email',$em)->get();
   //dd($db[0]->usertype);
   
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
   
        //if(array('email' => $input['email'], 'password' => $input['password']))
        if($db[0]->email==$input['email'] && $db[0]->password==$input['password'])
        {
            if ($db[0]->usertype == "admin")
             {
                $request->session()->put('adminid',$db[0]->email);
                return redirect('adminindex');
            }

            if ($db[0]->usertype == "byuser")
             {
                $data = profile::where('email',$input['email'])->get();
                //dd("$data");
            
                return view('admin/viewuser',compact("data"));
            }


            elseif($db[0]->usertype == "byadmin")
            {
                $data = profile::where('email',$input['email'])->get();
                //dd("$data");
                return view('admin/viewuser',compact("data"));
            }
        }
            else
            {
                return redirect('login')
                ->with('error','Email address or password are wrong');
            } 
    }
         
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(profile $profile,$id)
    {
        return view('admin/edit')->with('data',profile::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, profile $profile,$id)
    {
        $ob= profile::find($id);
        $ob->name= $request->name;
        $ob->email= $request->email;
        $ob->mobile= $request->mobile;
        $ob->password= $request->password;
        $ob->address= $request->address;
        $ob->save();
        $request->session()->flash('msg','Data updated succesfully!!');
        return redirect('alluser');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,profile $profile ,$id,)
    {
        profile::destroy('id',$id);
        $request->session()->flash('msg','Data Deleted Succesfully!!');
        return redirect('alluser');
    }
}
