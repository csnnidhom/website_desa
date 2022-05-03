<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Video::all();
        $name_category = Category::all();
        $title = 'Video';
        return view('admin/video', compact('data', 'name_category', 'title'));
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
            'video' => 'required|file|mimetypes:video/mp4',
        ]);

        $path = $request->file('video')->store('public/video');

        $image = new Video();
        $image->title = $request->title;
        $image->id_category = $request->name_category;
        $image->video = $path;
        $image->save();

        return redirect('admin/video')->with('success', 'Post has been created successfully.');
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

        $video = Video::find($id);
        if ($request->video) {
            $request->validate([
                'video' => 'required|file|mimetypes:video/mp4',
            ]);
            $path = $request->file('video')->store('public/update_video');
            $video->video = $path;
        }

        $video->title = $request->title;
        $video->id_category = $request->name_category;
        $video->save();

        return redirect('admin/video')->with('success', 'Post Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('video')->where('id', $id)->delete();
        return redirect('admin/video')->with('success', 'Post Has Been Deleted');
    }
}
