<?php

namespace App\Http\Controllers;

use App\Forum;
use Illuminate\Http\Request;
use App\Http\Requests\ForumRequest;
use Illuminate\Support\Facades\Auth;

class ForumController extends Controller
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
    public function store(ForumRequest $request)
    {
        // Untuk menyimpan informasi forum baru

        $forum = new Forum;
        $forum->school_info_id = Auth::user()->schoolInfo()->first()->id;
        if(Auth::user()->siswa()->first()) {
            $forum->kelas_id = Auth::user()->siswa()->first()->kelas()->first()->id;
        } else if(Auth::user()->guru()->first()) {
            $forum->kelas_id = Auth::user()->guru()->first()->kelas()->first()->id;
        }
        $forum->title = $request->title;
        $forum->description = $request->description;

        Auth::user()->forums()->save($forum);

        return back()->with('success', 'Postingan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Forum $forum)
    {
        // Melihat Forum
        if($forum->user()->first()->siswa()->first()) {
            $user = $forum->user()->first()->siswa()->first()->nama;
        } else if($forum->user()->first()->guru()->first()){
            $user = $forum->user()->first()->guru()->first()->nama;
        } else {
            $user = $forum->user()->first()->name;
        }
        return view('forum.show', [
            'forum' => $forum,
            'user' => $user
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
    public function update(ForumRequest $request, $id)
    {
        // Memperbarui postingan forum

        $post = Forum::findOrFail($id);
        $post->title = $request->title;
        $post->description = $request->description;

        $post->save();

        return redirect()->route('forum.show', $id)->with('success', 'Post berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Menghapus postingan

        $post = Forum::findOrFail($id);

        $post->delete();

        return redirect()->route('classmates')->with('success', 'Postingan berhasil dihapus!');
    }
}
