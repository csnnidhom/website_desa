<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function index(Request $request)
    {
        $data = Berita::with(['category'])->orderBy('created_at', 'desc');
        $title = 'Berita';

        if ($request->get('category')) {
            $category = $request->category;
            $data->whereHas(
                'category',
                function ($query) use ($category) {
                    $query->where('name', 'LIKE', "%{$category}%");
                }
            );
        } else {
        }

        if ($request->get('keyword')) {
            $data->search($request->keyword);
        }

        return view('admin/berita', [
            'data' => $data->paginate(5)->withQueryString(),
            'name_category' => Category::all(),
            'title' => $title
        ]);
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
            'image' => 'required|image|mimes:png,jpg,jpeg|max:1000',
            'caption' => 'required',
            'content' => 'required',
            'title' => 'required',
            'name_category' => 'required',
        ]);

        //upload image
        $path = $request->file('image')->store('public/image');

        $berita = new Berita();
        $berita->title = $request->title;
        $berita->content = $request->content;
        $berita->id_category = $request->name_category;
        $berita->image = $path;
        $berita->caption = $request->caption;
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
            'content' => 'required',
            'title' => 'required',
            'name_category' => 'required',
            'caption' => 'required'
        ]);

        $berita = Berita::find($id);
        if ($request->image) {
            $request->validate([
                'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:1000',
            ]);
            $path = $request->file('image')->store('public/update_images');
            $berita->image = $path;
        }

        $berita->title = $request->title;
        $berita->content = $request->content;
        $berita->id_category = $request->name_category;
        $berita->caption = $request->caption;
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

    public function ubahStatus($id)
    {
        $data = Berita::where('id', $id)->first();

        $status_sekarang = $data->status;

        if ($status_sekarang == 1) {
            Berita::where('id', $id)->update([
                'status' => 0
            ]);
        } else {
            Berita::where('id', $id)->update([
                'status' => 1
            ]);
        }
        return redirect('admin/berita')->with('success', 'Status Berhasil diubah');
    }
}
