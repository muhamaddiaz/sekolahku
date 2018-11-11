<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;
use App\User;
use App\Guru;
use App\Siswa;
use App\Kelas;
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
        if(Auth::user()->role == 1)
        {
            $school = Auth::user()->schoolInfo()->first();
            return view('user.show', [
            'school' => $school
        ]);
        }
        elseif(Auth::user()->role == 2)
        {
            $school = Auth::user()->schoolInfo()->first();
            $guru = Auth::user()->guru()->first();
            return view('user.show', [
            'school' => $school,
            'guru' => $guru
        ]);
        }
        else
        {
            $school = Auth::user()->schoolInfo()->first();
            $siswa = Auth::user()->siswa()->first();
            $kelas = Kelas::find($siswa)->first();  
            return view('user.show', [
            'school' => $school,
            'siswa' => $siswa,
            'kelas' => $kelas
        ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Auth::user()->role == 1)
        {
            $school = Auth::user()->schoolInfo()->first();
            return view('user.edit', [
            'school' => $school
        ]);
        }
        elseif(Auth::user()->role == 2)
        {
            $school = Auth::user()->schoolInfo()->first();
            $guru = Auth::user()->guru()->first();
            return view('user.edit', [
            'school' => $school,
            'guru' => $guru
        ]);
        }
        else
        {
            $school = Auth::user()->schoolInfo()->first();
            $siswa = Auth::user()->siswa()->first();
            $kelas = Kelas::find($siswa)->first();  
            return view('user.edit', [
            'school' => $school,
            'siswa' => $siswa,
            'kelas' => $kelas
        ]);
        }
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
        if(Auth::check())
        {
                if(Auth::user()->role == 1)
                {
                    $request_data = $request->all();
                    $validator=Validator::make($request->all(),
                        [       
                        'name' => 'required',
                        'username' => 'required',
                        'email' => 'required|email',
                        'image' => 'required',
                        ]);
                    if($validator->passes())
                    {
                        $user = User::find($request_data['id']);
                        $gambar = $request->file('image');
                        $namaFile = $gambar->getClientOriginalName();
                        $request->file('image')->move('profile_picture', $namaFile);
                        $user->name = $request_data['name'];
                        $user->foto = $namaFile;
                        $user->username = $request_data['username'];
                        $user->password = $request_data['password'];
                        $user->email = $request_data['email'];
                        $user->save();
                        return redirect()->route('show_profile');
                    }
                    else
                    {
                        return redirect()->route('edit_profile_menu',$request_data['id'])
                        ->withErrors($validator);
                    }
                }
                elseif(Auth::user()->role == 2)
                {
                    $request_data = $request->all();
                    $validator=Validator::make($request_data,
                        [       
                        'name' => 'required',
                        'image' => 'required|image|mimes:jpg,png,jpeg|max:2048',
                        ]);
                    if($validator->passes())
                    {
                        $guru = Guru::find($request_data['id']);
                        $guru->nama= $request->name;
                        $gambar = $request->file('image');
                        $namaFile = $gambar->getClientOriginalName();
                        $request->file('image')->move('profile_picture', $namaFile);
                        $guru->foto = $namaFile;
                        $guru->save();
                        return redirect()->route('show_profile');
                    }
                    else
                    {
                        return redirect()->route('edit_profile_menu',$request_data['id'])
                        ->withErrors($validator)
                        ->withInput();
                    }
                    
                }
                else
                {
                    $request_data = $request->all();
                    $validator=Validator::make($request_data,
                        [       
                        'name' => 'required',
                        'email' => 'required|email',
                        'image' => 'required|image|mimes:jpg,png,jpeg|max:2048',
                        ]);
                    if($validator->passes())
                    {
                        $siswa = Siswa::find($request_data['id']);
                        $siswa->nama=$request->name;
                        $siswa->email=$request->email;
                        $gambar = $request->file('image');
                        $namaFile = $gambar->getClientOriginalName();
                        $request->file('image')->move('profile_picture', $namaFile);
                        $siswa->foto = $namaFile;
                        $siswa->save();
                        return redirect()->route('show_profile');
                    }
                    else
                    {
                        return redirect()->route('edit_profile_menu',$request_data['id'])
                        ->withErrors($validator);
                    }
                }
            
        }
        else
        {
            return redirect('/');
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
