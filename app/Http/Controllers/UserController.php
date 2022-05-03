<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Category;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function home(Request $request)
    {
        $title = "Home";
        $postingan_terbaru = Berita::orderBy('created_at', 'asc')->limit(3)->where('status', 0)->get();
        $data = Berita::with(['category'])->orderBy('id_category')->where('status', 1);

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

        return view('user/Home/home', [
            'data' => $data->paginate(6)->withQueryString(),
            'name_category' => Category::all(),
            'title' => $title,
            'postingan_terbaru' => $postingan_terbaru
        ]);
    }

    public function detail($id)
    {
        $title = "Berita Detail";
        $berita_terbaru = Berita::orderBy('created_at', 'asc')->limit(3)->get();
        $detail = Berita::where('id', $id)->first();
        $name_category = Category::all();
        return view('user/Home/berita_detail', compact('detail', 'title', 'berita_terbaru', 'name_category'));
    }

    public function visi_misi()
    {
        $title = "Visi Misi";
        return view('user/Profil/visi_misi', compact('title'));
    }

    public function struktur_organisasi()
    {
        $title = "Struktur Organisasi Desa";
        return view('user/Profil/struktur_organisasi', compact('title'));
    }
    public function organisasi()
    {
        $title = "Organisasi";
        $data = Category::all();
        return view('user/Organisasi/organisasi', compact('title',  'data'));
    }

    public function kartar()
    {
        $title = "Karang Taruna";
        return view('user/Organisasi/kartar', compact('title'));
    }

    public function kontak()
    {
        $title = "Kontak";
        return view('user/Contact/kontak', compact('title'));
    }
}
