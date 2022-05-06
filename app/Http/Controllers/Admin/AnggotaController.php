<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Anggota;
use App\Models\Category;
use Illuminate\Http\Request;

class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $title = "Anggota";
        $data = Anggota::with(['category'])->orderBy('created_at', 'desc');

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

        return view('admin/anggota', [
            'data' => $data->paginate(6)->withQueryString(),
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
            'name' => 'required',
            'jabatan' => 'required',
            'bio' => 'required',
            'name_category' => 'required',
        ]);

        //upload image
        $path = $request->file('image')->store('public/image');

        $anggota = new Anggota();
        $anggota->name = $request->name;
        $anggota->jabatan = $request->jabatan;
        $anggota->bio = $request->bio;
        $anggota->image = $path;
        $anggota->id_category = $request->name_category;
        $anggota->save();

        return redirect('admin/anggota')->with('success', 'Post has been created successfully.');
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
            'image' => 'required|image|mimes:png,jpg,jpeg|max:1000',
            'name' => 'required',
            'jabatan' => 'required',
            'bio' => 'required',
            'name_category' => 'required',
        ]);

        $anggota = Anggota::find($id);
        if ($request->image) {
            $request->validate([
                'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:1000',
            ]);
            $path = $request->file('image')->store('public/update_images');
            $anggota->image = $path;
        }
        $anggota->name = $request->name;
        $anggota->jabatan = $request->jabatan;
        $anggota->bio = $request->bio;
        $anggota->image = $path;
        $anggota->id_category = $request->name_category;
        $anggota->save();

        return redirect('admin/anggota')->with('success', 'Post has been created successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Anggota::where('id', $id)->delete();
        return redirect('admin/anggota')->with('success', 'Post Has Been Deleted');
    }
}
