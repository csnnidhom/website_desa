<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Berita;
use App\Models\Category;
use App\Models\Pesan;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function home(Request $request)
    {
        $title = "Home";
        $data = Berita::with(['category'])->orderBy('created_at', 'desc')->where('status', 1);

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
        ]);
    }

    public function detail($id)
    {
        $title = "Berita Detail";
        $berita_terbaru = Berita::orderBy('created_at', 'desc')->limit(3)->get();
        $detail = Berita::where('id', $id)->first();
        $name_category = Category::all();
        return view('user/Home/berita_detail', compact('detail', 'title', 'berita_terbaru', 'name_category'));
    }

    public function visi_misi()
    {
        $title = "Visi Misi";
        return view('user/Profil/visi_misi', compact('title'));
    }

    public function struktur_organisasi_desa()
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

    // Kartar
    public function kartar()
    {
        $title = "Karang Taruna";
        return view('user/Organisasi/Kartar/menu', compact('title'));
    }

    public function struktur_organisasi_kartar()
    {
        $data = Anggota::orderBy('created_at', 'desc')->where('id_category', 2)->get();
        $title = "Struktur Organisasi";
        return view('user/Organisasi/Kartar/struktur_organisasi', compact('title', 'data'));
    }

    public function galeri_kartar()
    {
        $title = "Galeri";
        return view('user/Organisasi/Kartar/galeri', compact('title'));
    }

    public function berita_kartar()
    {
        $title = "Berita";
        $berita_kartar = Berita::orderBy('created_at', 'desc')->where([['status', 1], ['id_category', 2]])->paginate(3)->withQueryString();
        return view('user/Organisasi/Kartar/berita', compact('title', 'berita_kartar'));
    }

    //Remas
    public function remas()
    {
        $title = "Remaja Masjid";
        return view('user/Organisasi/Remas/menu', compact('title'));
    }

    public function struktur_organisasi_remas()
    {
        $data = Anggota::orderBy('created_at', 'desc')->where('id_category', 3)->get();
        $title = "Struktur Organisasi";
        return view('user/Organisasi/Remas/struktur_organisasi', compact('title', 'data'));
    }

    public function galeri_remas()
    {
        $title = "Galeri";
        return view('user/Organisasi/Remas/galeri', compact('title'));
    }

    public function berita_remas()
    {
        $title = "Berita";
        $berita_remas = Berita::orderBy('created_at', 'desc')->where([['status', 1], ['id_category', 3]])->paginate(3)->withQueryString();
        return view('user/Organisasi/Remas/berita', compact('title', 'berita_remas'));
    }

    //ASM Putra
    public function asm_putra()
    {
        $title = "ASM Putra";
        return view('user/Organisasi/ASM/menu', compact('title'));
    }

    public function struktur_organisasi_asm_putra()
    {
        $data = Anggota::orderBy('created_at', 'desc')->where('id_category', 4)->get();
        $title = "Struktur Organisasi";
        return view('user/Organisasi/ASM/struktur_organisasi', compact('title', 'data'));
    }

    public function galeri_asm_putra()
    {
        $title = "Galeri";
        return view('user/Organisasi/ASM/galeri', compact('title'));
    }

    public function berita_asm_putra()
    {
        $title = "Berita";
        $berita_asm_putra = Berita::orderBy('created_at', 'desc')->where([['status', 1], ['id_category', 4]])->paginate(3)->withQueryString();
        return view('user/Organisasi/ASM/berita', compact('title', 'berita_asm_putra'));
    }

    public function kontak()
    {
        $title = "Kontak";
        return view('user/Contact/kontak', compact('title'));
    }

    public function kirim_pesan(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'perihal' => 'required',
            'pesan' => 'required',
        ]);

        $category = new Pesan();
        $category->name = $request->name;
        $category->email = $request->email;
        $category->perihal = $request->perihal;
        $category->pesan = $request->pesan;
        $category->save();

        return redirect('/kontak')
            ->with('success', 'Pesan Telah Terkirim');
    }
}
