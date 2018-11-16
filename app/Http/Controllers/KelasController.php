<?php

namespace App\Http\Controllers;

use App\Kelas;
use App\Guru;
use App\Http\Requests\KelasRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function classMates() {
        $kelas = []; $mates = []; $kelasForum = [];
        $user = Auth::user();
        if((Auth::user()->siswa()->first())) {
            $kelas = $user->siswa()->first()->kelas()->first();
            $mates = $kelas->siswa()->get();
            $kelasForum = $kelas->forum()->orderBy('updated_at', 'desc')->get();
        } else if(Auth::user()->guru()->first()) {
            $kelas = $user->guru()->first()->kelas()->first();
            if($kelas) {
                $mates = $kelas->siswa()->get();
                $kelasForum = $kelas->forum()->orderBy('updated_at', 'desc')->get();
            }
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
        $school = Auth::user()->schoolInfo()->first();

        return view('kelas.index', [
            'kelas' => $kelas,
            'guru' => $guru,
            'school' => $school
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

        $kelas = Kelas::create([
            'tingkat_kelas' => $request->tingkat,
            'jurusan_kelas' => $request->jurusan,
            'bagian_kelas' => $request->bagian,
            'guru_id' => $request->wali,
            'school_info_id' => Auth::user()->schoolInfo()->first()->id
        ]);

        $guru = Guru::find($request->wali);
        if(!$guru->kelas_id) {
            $guru->kelas_id = $kelas->id;
            $guru->save();
        } else {
            return back()->with('danger', 'Wali kelas tidak kosong!');
        }
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
        $kelas = Kelas::find($id);
        $wali = $kelas->guru()->first();
        $siswa = $kelas->siswa()->get();
        $forum = $kelas->forum()->get();
        return view('kelas.show', [
            'kelas' => $kelas, 
            'siswa' => $siswa,
            'wali' => $wali,
            'forum' => $forum
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
        // Edit Informasi Kelas
        $kelas = Kelas::find($id);
        $guru = Auth::user()->schoolInfo()->first()
                    ->guru()->get();
        return view('kelas.edit',[
            'kelas' => $kelas,
            'guru' => $guru
        ]);
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
        // Untuk melakukan edit kelas pada database

        $kelas = Kelas::findOrFail($id);
        $kelas->tingkat_kelas = $request->tingkat;
        $kelas->jurusan_kelas = $request->jurusan;
        $kelas->bagian_kelas = $request->bagian;

        $guru = Guru::findOrFail($request->wali);

        if($guru->kelas_id == null) {
            $wali = $kelas->guru()->first();
            if($wali) {
                $wali->kelas_id = null;
                $wali->save();
            }
            $guru->kelas_id = $kelas->id;
            $kelas->guru_id = $guru->id;
            $guru->save();
            $kelas->save();

            return redirect()->route('kelas.index')->with('success', 'Informasi kelas berhasil diupdate!');
        }
        return back()->with('danger', 'Wali kelas tidak dapat dipilih');
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
        $user = Auth::user()->schoolInfo()->first()->kelas()->where('id', $id)->first()->guru()->first();
        $siswa = Auth::user()->schoolInfo()->first()->kelas()->where('id', $id)->first()->siswa()->get();
        if($siswa) {
            foreach($siswa as $s) {
                $s->kelas_id = null;
                $s->save();
            }
        }
        if($user) {
            $user->kelas_id = null;
            $user->save();
        }
        Auth::user()->schoolInfo()->first()->kelas()->where('id', $id)->delete();
        return back()->with('success', 'Kelas telah berhasil dihapus');
    }
}
