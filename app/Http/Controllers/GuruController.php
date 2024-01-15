<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Mengajar;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class GuruController extends Controller
{
    public function index()
    {
        return view('guru.index', [
            'guru' => Guru::all()
        ]);
    }

    public function create()
    {
        return view('guru.create');
    }

    public function store(Request $request)
    {
        $data_guru = $request->validate([
            'nip' => ['required', 'numeric', 'unique:gurus'],
            'nama_guru' => ['required'],
            'jk' => ['required'],
            'alamat' => ['required'],
            'password' => ['required']
        ]);
        Guru::create($data_guru);
        return redirect('/guru/index')->with('success', 'Data guru berhasil ditambah');
    }

    public function edit(Guru $guru)
    {
        return view('guru.edit', [
            'guru' => $guru
        ]);
    }

    public function update(Request $request, Guru $guru)
    {
        $data_guru = $request->validate([
            'nip' => ['required', 'numeric', Rule::unique('gurus')->ignore($guru->id)],
            'nama_guru' => ['required'],
            'jk' => ['required'],
            'alamat' => ['required'],
            'password' => ['required']
        ]);

        $guru->update($data_guru);
        return redirect('/guru/index')->with('success', 'Data guru berhasil diubah');
    }

    public function destroy(Guru $guru)
    {
        $mengajar = Mengajar::where('guru_id', $guru->id)->first();

        if ($mengajar) {
            return back()->with('error', "$guru->nama_guru masih digunakan di menu mengajar");
        }

        $guru->delete();

        return back()->with('success', 'Data guru berhasil dihapus');
    }
}
