<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;
class UserController extends Controller
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $school = Auth::user()->schoolInfo()->first();
        return view('user.show', ['school' => $school]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('user.edit');
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
        if(Auth::user()->role == 1)
        {
            $name=$request->name;
            $username=$request->username;
            $email=$request->email;
            $password=$request->password;
            $gambar = $request->file('image');
            $namaFile = $gambar->getClientOriginalName();
            $request->file('image')->move('profile_picture', $namaFile);
            DB::update("UPDATE users SET name=?,username=?,email=?,password=?,foto=?",[$name,$username,$email,$password,$namaFile]);
            return redirect()->route('show_profile');
        }
        elseif(Auth::user()->role == 2)
        {
            $name=$request->name;
            $gambar = $request->file('image');
            $namaFile = $gambar->getClientOriginalName();
            $request->file('image')->move('profile_picture', $namaFile);
            DB::update("UPDATE users SET name=?,foto=?",[$name,$namaFile]);
            return redirect()->route('show_profile');
        }
        else
        {
            $name=$request->name;
            $email=$request->email;
            $gambar = $request->file('image');
            $namaFile = $gambar->getClientOriginalName();
            $request->file('image')->move('profile_picture', $namaFile);
            DB::update("UPDATE users SET name=?,email=?,foto=?",[$name,$email,$namaFile]);
            return redirect()->route('show_profile');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
