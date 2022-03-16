<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        return response()->json([
            'message' => 'Ini Halaman Berita',
        ], 200);
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
        $request->validate([
            'image' => 'required',
            'title' => 'required',
            'content' => 'required',
            'id_category' => 'required'
        ]);

        // dd($request->all());

        //upload image
        // $path = $request->file('image')->store('public/image');

        $berita = new Berita();
        $berita->title = $request->title;
        $berita->content = $request->content;
        $berita->id_category = $request->id_category;
        $berita->image = $request->image;
        $berita->save();

        return response()->json([
            'message' => 'Berhasil Menambahkan',
            'data_berita' => $berita
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $berita = Berita::find($id);
        // dd($berita);

        return response()->json([
            'message' => 'Success',
            'data_berita' => $berita
        ], 200);
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
        $berita = Berita::find($id);

        $request->validate([
            'image' => 'required',
            'title' => 'required',
            'content' => 'required',
            'id_category' => 'required'
        ]);

        $berita->update([
            'title' => $request->title,
            'content' => $request->content,
            'id_category' => $request->id_category,
            'image' => $request->image,
        ]);
        // dd($berita);

        return response()->json([
            'message' => 'Berhasil Merubah Data',
            'data_berita' => $berita
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $berita = Berita::find($id)->delete();
        // dd($berita);
        return response()->json([
            'message' => 'Berhasil Menghapus'
        ], 200);
    }
}
