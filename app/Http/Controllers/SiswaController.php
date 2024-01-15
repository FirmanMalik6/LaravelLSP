<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Nilai;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SiswaController extends Controller
{
    public function index()
    {
        return view('siswa.index', [
            'siswa' => Siswa::all()
        ]);
    }

    public function create()
    {
        return view('siswa.create', [
            'kelas' => Kelas::all()
        ]);
    }

    public function store(Request $request)
    {
        $data_siswa = $request->validate([
            'nis' => ['required', 'numeric', 'unique:siswas'],
            'nama_siswa' => ['required'],
            'jk' => ['required'],
            'alamat' => ['required'],
            'kelas_id' => ['required'],
            'password' => ['required']
        ]);

        Siswa::create($data_siswa);
        return redirect('/siswa/index')->with('success', "Data siswa berhasil ditambah");
    }

    public function edit(Siswa $siswa)
    {
        return view('siswa.edit', [
            'siswa' => $siswa,
            'kelas' => Kelas::all()
        ]);
    }

    public function update(Request $request, Siswa $siswa)
    {
        $data_siswa = $request->validate([
            'nis' => ['required', 'numeric', Rule::unique('siswas')->ignore($siswa->id)],
            'nama_siswa' => ['required'],
            'jk' => ['required'],
            'alamat' => ['required'],
            'kelas_id' => ['required'],
            'password' => ['required']
        ]);
        $siswa->update($data_siswa);
        return redirect('/siswa/index')->with('success', 'Data siswa berhasil diubah');
    }

    public function destroy(Siswa $siswa)
    {
        $nilai = Nilai::where('siswa_id', $siswa->id) ->first();

        if($nilai) {
            return back()->with('error', "$siswa->nama_siswa masih digunakan di menu nilai");
        }

        $siswa->delete();
        return back() ->with('success', "Data siswa berhasil dihapus");
    }
}
