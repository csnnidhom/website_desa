<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Berita::all();
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
        $validator = Validator::make($request->all(), [
            'image' => 'required',
            'title' => 'required',
            'content' => 'required',
            'id_category' => 'required'
        ]);

        //upload image
        // $path = $request->file('image')->store('public/image');

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        try {
            $data = Berita::create($request->all());
            $response = [
                'message' => 'Berhasil Menambahkan',
                'data' => $data
            ];

            return response()->json($response, 200);
        } catch (QueryException $e) {
            return response()->json([
                'message' => 'Gagal Menambahkan' . $e->errorInfo
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
        $data = Berita::find($id);
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
        $data = Berita::find($id);
        $validator = Validator::make($request->all(), [
            'image' => 'required',
            'title' => 'required',
            'content' => 'required',
            'id_category' => 'required'
        ]);

        //upload image
        // $path = $request->file('image')->store('public/image');

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        try {
            $data->update($request->all());
            $response = [
                'message' => 'Berhasil Merubah',
                'data' => $data
            ];

            return response()->json($response, 200);
        } catch (QueryException $e) {
            return response()->json([
                'message' => 'Gagal Merubah' . $e->errorInfo
            ]);
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
        $data = Berita::find($id);
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
