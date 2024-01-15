<?php

namespace App\Http\Controllers;

use App\Models\Mapel;
use App\Models\Mengajar;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class MapelController extends Controller
{
    public function index()
    {
        return view('mapel.index', [
            'mapel' => Mapel::all()
        ]);
    }
    public function create()
    {
        return view('mapel.create');
    }

    public function store(Request $request)
    {
        $data_mapel = $request->validate([
            'nama_mapel' => ['required', 'unique:mapels']
        ]);

        Mapel::create($data_mapel);
        return redirect('/mapel/index')->with('success', 'Data mata pelajaran berhasil ditambah');
    }

    public function edit(Mapel $mapel)
    {
        return view('mapel.edit', [
            'mapel' => $mapel
        ]);
    }

    public function update(Request $request, Mapel $mapel)
    {
        $data_mapel = $request->validate([
            'nama_mapel' => ['required', Rule::unique('mapels')->ignore($mapel->id)]
        ]);

        $mapel->update($data_mapel);
        return redirect('/mapel/index')->with('success', 'Data mata pelajaran berhasil diubah');
    }

    public function destroy(Mapel $mapel)
    {
        $mengajar = Mengajar::where('mapel_id',$mapel->id)->first();
        if ($mengajar){
            return back()->with('error','Mata Pelajaran sedang digunakan di menu mengajar');
        }

        $mapel->delete();
        return back()->with('success', 'Data mata pelajaran berhasil dihapus');
    }
}
