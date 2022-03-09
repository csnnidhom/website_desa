<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Berita;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Berita::all();
        $name_category = Category::all();
        return view('admin/berita', compact('data', 'name_category'));
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
            'name_category' => 'required',
            'image' => 'required|image|mimes:png,jpg,jpeg'
        ]);

        //upload image
        $path = $request->file('image')->store('public/image');

        $berita = new Berita();
        $berita->title = $request->title;
        $berita->content = $request->content;
        $berita->id_category = $request->name_category;
        $berita->image = $path;
        $berita->save();

        return redirect('admin/berita')->with('success', 'Post has been created successfully.');
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
        $request->validate([
            'name_category' => 'required',
        ]);

        $berita = Berita::find($id);
        if ($request->image) {
            $request->validate([
                'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ]);
            $path = $request->file('image')->store('public/images');
            $berita->image = $path;
        }

        $berita->title = $request->title;
        $berita->content = $request->content;
        $berita->id_category = $request->name_category;
        $berita->save();

        return redirect('admin/berita')->with('success', 'Post Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('berita')->where('id', $id)->delete();
        return redirect('admin/berita')->with('success', 'Post Has Been Deleted');
    }
}
