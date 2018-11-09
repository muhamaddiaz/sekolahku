<?php

namespace App\Http\Controllers;
use App\Mading;
use App\User;
use App\Siswa;
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
        $mading->kategori = $request->kategori;
        $mading->deskripsi = $request->deskripsi;
        $gambar = $request->file('image_mading');
        $namaFile = $gambar->getClientOriginalName();
        $request->file('image_mading')->move('mading_picture', $namaFile);
        $mading->image_mading = $namaFile;

        $save = Auth::user()->siswa()->first()->mading()->save($mading);
        return redirect()->route('emading');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mading = Mading::find($id);
        $siswa = $mading->siswa()->first();
        return view('mading.show');
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
        //
    }
}
