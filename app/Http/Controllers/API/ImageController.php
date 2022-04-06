<?php

namespace App\Http\Controllers\API;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Models\Image;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Image::all();
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
        $this->validate($request, [
            'title' => 'required',
            'image' => 'required',
            'id_category' => 'required'
        ]);

        //upload ke storage
        $path = $request->file('image')->store('images', 'public');

        // if ($validator->fails()) {
        //     return response()->json($validator->errors(), 422);
        // }

        try {
            $data = Image::create([
                'title' => $request->title,
                'image' => $path,
                'id_category' => $request->id_category
            ]);
            $response = [
                'message' => 'Berhasil Ditambahkan',
                'data' => $data
            ];

            return response()->json($response, 200);
        } catch (QueryException $e) {
            return response()->json([
                'message' => 'Gagal Ditambahkan' . $e->errorInfo
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Image::find($id);
        return response()->json([
            'message' => "data sesuai id",
            'data' => $data
        ], 200);
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



        //upload image
        // $path = $request->file('image')->store('public/image');


        Image::where('id', $request->id)->update([
            'title' => $request->title,
            'id_category' => $request->id_category,
        ]);
        if ($request->image) {
            $request->validate([
                'image' => 'required|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ]);
            $path = $request->file('image')->store('images', 'public');
            // $data->image = $path;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Image::find($id);
        try {
            $data->delete();
            $response = [
                'message' => 'Berhasil Menghapus',
            ];
            return response()->json($response, 200);
        } catch (QueryException $e) {
            return response()->json([
                'message' => 'Gagal Menghapus' . $e->errorInfo
            ]);
        }
    }
}
