<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Mengajar;
use Illuminate\Http\Request;

class MengajarController extends Controller
{
    public function index()
    {
        return view('mengajar.index', [
            'mengajar' => Mengajar::all()
        ]);
    }

    public function create()
    {
        return view('mengajar.create', [
            'guru' => Guru::all(),
            'mapel' => Mapel::all(),
            'kelas' => Kelas::all()
        ]);
    }

    public function store(Request $request)
    {
        $data_mengajar = $request->validate([
            'guru_id' => ['required'],
            'mapel_id' => ['required'],
            'kelas_id' => ['required']
        ]);

        $mengajar = Mengajar::where('mapel_id', $request->mapel_id)->where('kelas_id', $request->kelas_id)->first();
        if ($mengajar == true) {
            return back()->with('error', 'Data mengajar yang dimasukkan sudah ada');
        } else {
            Mengajar::create($data_mengajar);
            return redirect('/mengajar/index')->with('success', 'Data mengajar berhasil ditambah');
        }
    }

    public function edit(Mengajar $mengajar)
    {
        return view('mengajar.edit', [
            'mengajar' => $mengajar,
            'guru' => Guru::all(),
            'mapel' => Mapel::all(),
            'kelas' => Kelas::all()
        ]);
    }

    public function update(Request $request, Mengajar $mengajar)
    {
        $data_mengajar = $request->validate([
            'guru_id' => ['required'],
            'mapel_id' => ['required'],
            'kelas_id' => ['required'],
        ]);

        if ($request->mapel_id != $mengajar->mapel_id || $request->kelas_id != $mengajar->kelas_id) {
            $cek_mengajar = Mengajar::where('mapel_id', $request->mapel_id)->where('kelas_id', $request->kelas_id)->first();

            if ($cek_mengajar) {
                return back()->with('error', 'Data mengajar yang dimasukkan salah');
            }
        }

        $mengajar->update($data_mengajar);
        return redirect('/mengajar/index')->with('success', 'Data mengajar berhasil diubah');
    }

    public function destroy(Mengajar $mengajar)
    {
        $mengajar->delete();
        return back()->with('success', "Data mengajar berhasil dihapus");
    }
}
