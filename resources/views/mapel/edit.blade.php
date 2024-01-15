@extends('layout.main')
@section('content')
    <div class="container-form">
        <h2 align="center">Edit Data Mapel</h2>

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <p class="alert">{{ $error }}</p>
            @endforeach
        @endif

        <form action="/mapel/update/{{ $mapel->id }}" method="POST">
            @csrf
            <label for="nama_mapel">Mata Pelajaran</label>
            <input type="text" name="nama_mapel" id="nama_mapel" value="{{$mapel->nama_mapel}}">

            <button class="button-submit" type="submit">UBAH</button>
        </form>
    </div>
@endsection
