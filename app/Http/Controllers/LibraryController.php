<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Library;
use App\Report;
use DB;
use App\Notification;
use Illuminate\Support\Facades\Auth;

class LibraryController extends Controller
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
        $school = Auth::user()->schoolInfo()->first();
        return view('library.store',[
            'school' => $school
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        ini_set('upload_max_filesize limit', '100M');
        $library = new Library;
        $library->judul = $request->title;
        $library->deskripsi = $request->summernote;
        $library->kategori = $request->kategori;
        $library->user_id = $request->id;
        $file = $request->file('file');
        $namaFile = $file->getClientOriginalName();
        $request->file('file')->move('library/file',$namaFile);
        $library->file_buku = $namaFile;
        $image =$request->file('image');
        $namaImage = $image->getClientOriginalName();
        $request->file('image')->move('library/image',$namaImage);
        $library->image = $namaImage;
        $save = Auth::user()->first()->schoolInfo()->first()->library()->save($library);
        return redirect()->route('main.elibrary');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
    public function show($id)
    {

    }
    */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $school = Auth::user()->schoolInfo()->first();
        $library = Library::find($id);
        return view('library.edit',[
            'school' => $school,
            'library' => $library
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
        $library = Library::find($id);
        $library->judul = $request->title;
        $library->kategori = $request->kategori;
        $library->deskripsi = $request->summernote;
        $file = $request->file('file');
        $namaFile = $file->getClientOriginalName();
        $request->file('file')->move('library/file',$namaFile);
        $library->file_buku = $namaFile;
        $image =$request->file('image');
        $namaImage = $image->getClientOriginalName();
        $request->file('image')->move('library/image',$namaImage);
        $library->image = $namaImage;
        $library->save();
        return redirect()->route('main.elibrary');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('libraries')->where('id',$id)->delete();
        return redirect()->route('main.elibrary');
    }
    public function download($id)
    {
        $library = Library::find($id);
        $file = public_path()."/library/file/{$library->file_buku}";
        $headers = array(
                'Content-Type: application/pdf',
                );
        return response()->download($file,$library->file_buku,$headers);
    }
}
