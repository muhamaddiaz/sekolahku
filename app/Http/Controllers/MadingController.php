<?php

namespace App\Http\Controllers;
use App\Mading;
use App\User;
use App\Siswa;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class MadingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Meanmpilkan seluruh data mading
        return response()->json(Mading::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $mading = new Mading;
        $mading->judul_mading = $request->judul;
        $mading->kategori_mading = $request->kategori;
        $mading->deskripsi = $request->deskripsi;
        $gambar = $request->file('gambar');
        $namaFile = $gambar->getClientOriginalName();
        $request->file('gambar')->move('mading_picture', $namaFile);
        $mading->image_mading = $namaFile;

        $save = Auth::user()->siswa()->first()->mading()->save($mading);
        return redirect()->route('main.emading');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $school= Auth::user()->schoolInfo()->first();
        $mading = Mading::all()->first();
        $data = Auth::user()->siswa()->first();
        $user = Mading::all('siswa_id');
        $siswa = Siswa::find($user)->first();
        return view('mading.edit',[
            'mading' => $mading,
            'siswa' => $siswa,
            'data' => $data,
            'school' => $school
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
        $mading = Mading::find($request['id']);
        $gambar = $request->file('gambar');
        $namaFile = $gambar->getClientOriginalName();
        $request->file('gambar')->move('mading_picture', $namaFile);
        $mading->siswa_id = $request['id_siswa'];
        $mading->judul_mading = $request['judul'];
        $mading->image_mading = $namaFile;
        $mading->deskripsi = $request['deskripsi'];
        $mading->kategori_mading = $request['kategori'];
        $mading->save();
        return redirect()->route('main.emading');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('mading')->where('id',$id)->delete();
        return redirect()->route('main.emading');
    }
    public function create()
    {
        $school = Auth::user()->schoolInfo()->first();
        $siswa = Auth::user()->siswa()->first();
        return view('mading.store',[
            'siswa' => $siswa,
            'school' => $school
        ]);
    }
}
    