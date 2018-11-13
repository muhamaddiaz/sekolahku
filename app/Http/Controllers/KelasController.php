<?php

namespace App\Http\Controllers;

use App\Kelas;
use App\Http\Requests\KelasRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function classMates() {
        $kelas = ''; $mates = ''; $kelasForum = '';
        $user = Auth::user();
        if(!(Auth::user()->siswa())) {
            $kelas = $user->siswa()->first()->kelas()->first();
            $mates = $kelas->siswa()->get();
            $kelasForum = $kelas->forum()->orderBy('updated_at', 'desc')->get();
        }
        $forums = $user->schoolInfo()->first()->forums()->orderBy('updated_at', 'desc')->get();
        return view('kelas.classmates', [
            'kelas' => $kelas,
            'mates' => $mates,
            'forums' => $forums,
            'kelasForum' => $kelasForum
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Untuk menampilkan setiap kelas yang ada tergantung
        // dari superadmin yang sedang login

        $kelas = Auth::user()->schoolInfo()->first()
                    ->kelas()->get();
        $guru = Auth::user()->schoolInfo()->first()
                    ->guru()->get();

        return view('kelas.index', [
            'kelas' => $kelas,
            'guru' => $guru
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Membuat kelas baru
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Membuat kelas baru
        //$request->validated();

        $kelas = new Kelas;
        $kelas->tingkat_kelas = $request->tingkat;
        $kelas->jurusan_kelas = $request->jurusan;
        $kelas->bagian_kelas = $request->bagian;
        $kelas->guru_id = $request->wali;

        $saved = Auth::user()->schoolInfo()
                    ->first()->kelas()->save($kelas);

        return back()->with('success', 'Kelas berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Untuk melihat setiap informasi yang ada didalam kelas
        $id = decrypt($id);
        $kelas = Kelas::find($id);
        $siswa = $kelas->siswa()->get();
        return view('kelas.show', [
            'kelas' => $kelas, 
            'siswa' => $siswa
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Menghapus kelas yang dipilih oleh admin

        Auth::user()->schoolInfo()->first()->kelas()->where('id', $id)->delete();
        
        return back()->with('success', 'Kelas telah berhasil dihapus');
    }
}
