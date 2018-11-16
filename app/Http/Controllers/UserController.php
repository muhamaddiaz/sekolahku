<?php

namespace App\Http\Controllers;

use App\User;
use App\siswa as Siswa;
use Illuminate\Http\Request;
use DB;
use Validator;
use App\Guru;
use App\Kelas;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\PasswordAccount;

class UserController extends Controller
{
    public function profile(Request $req) {
        $path = $req->path();
        $user = Auth::user();
        $forums = Auth::user()->forums()->get();
        return view('user.show', [
            'path' => $path,
            'user' => $user,
            'forums' => $forums
        ]);
    }
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
        // Untuk menyimpan pengguna

        if($request->query('role') == 'pelajar') {
            $password = "secret";
            $user = new User;
            $user->school_info_id = Auth::user()->school_info_id;
            $user->name = $request->name;
            $user->username = $request->username;
            $user->role = 0;
            $user->email = $request->email;
            $user->password = Hash::make('secret');

            $user->save();

            $user = User::where('email', strtolower($request->email))->first();

            $siswa = new Siswa;
            $siswa->school_info_id = $user->school_info_id;
            $siswa->kelas_id = $request->kelas;
            $siswa->nama = $request->name;
            $siswa->NISN = $request->nisn;
            $siswa->email = $request->email;
            $siswa->osis = 0;
            
            $user->siswa()->save($siswa);

            Mail::to($user)->send(new PasswordAccount($user, $password));

            return back()->with('success', 'Data pelajar berhasil direkam');
        } else if($request->query('role') == 'pengajar') {
            $password = "secret";
            $user = new User;
            $user->school_info_id = Auth::user()->school_info_id;
            $user->name = $request->name;
            $user->username = $request->username;
            $user->role = 2;
            $user->email = strtolower($request->email);
            $user->password = Hash::make('secret');

            $user->save();

            $user = User::where('email', strtolower($request->email))->first();

            $guru = new Guru;
            $guru->school_info_id = Auth::user()->school_info_id;
            $guru->nama = $request->name;
            $guru->mata_pelajaran = 'Ekonomi';

            $user->guru()->save($guru);

            Mail::to($user)->send(new PasswordAccount($user, $password));

            return back()->with('success', 'Data pengajar berhasil direkam');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $req)
    {
        $path = 'hello';
        if($req->query('role') == 'pengajar') {
            $user = Guru::findOrFail($id);
            $forums = Guru::findOrFail($id)->user()->first()->forums()->get();
        } else {
            $user = Siswa::findOrFail($id);
            $forums = Siswa::findOrFail($id)->user()->first()->forums()->get();
        }
        return view('user.show', [
            'path' => $path,
            'user' => $user,
            'forums' => $forums
        ]);
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
