<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Image;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = Image::with(['category'])->orderBy('id_category');
        $title = 'Image';

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

        return view('admin/image', [
            'data' => $data->paginate(5)->withQueryString(),
            'name_category' => Category::all(),
            'title' => $title
        ]);
        return view('/admin/image', compact('data', 'name_category', 'title'));
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
            'title' => 'required',
            'name_category' => 'required',
            'image' => 'required|image|mimes:png,jpg,jpeg|max:1000'
        ]);

        $path = $request->file('image')->store('public/image');

        $image = new Image();
        $image->title = $request->title;
        $image->id_category = $request->name_category;
        $image->image = $path;
        $image->save();

        return redirect('admin/image')->with('success', 'Post has been created successfully.');
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
            'title' => 'required',
            'name_category' => 'required',
        ]);

        $image = Image::find($id);
        if ($request->image) {
            $request->validate([
                'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:1000',
            ]);
            $path = $request->file('image')->store('public/update_images');
            $image->image = $path;
        }

        $image->title = $request->title;
        $image->id_category = $request->name_category;
        $image->save();

        return redirect('admin/image')->with('success', 'Post Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('image')->where('id', $id)->delete();
        return redirect('admin/image')->with('success', 'Post Has Been Deleted');
    }
}
