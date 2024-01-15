@extends('layout.main')
@section('content')
    <div class="container-form">
        <h2 align="center">Tambah Data Kelas</h2>

        @if ($errors->any())
            <p class="text-danger">{{ session('error') }}</p>
        @endif

        <form action="/kelas/store" method="POST">
            @csrf
            <label for="kelas">Kelas</label>
            <select name="kelas" id="kelas">
                <option></option>
                @foreach ($tingkat_kelas as $k)
                    <option value="{{ $k }}">{{ $k }}</option>
                @endforeach
            </select>

            <label for="jurusan">Jurusan</label>
            <select name="jurusan" id="jurusan">
                <option></option>
                @foreach ($jurusan as $j)
                    <option value="{{ $j }}">{{ $j }}</option>
                @endforeach
            </select>

            <label>Jenis Kelamin </label>
            <input type="radio" name="jk" value="L">Laki-laki
            <input type="radio" name="jk" value="P">Perempuan

            <label for="rombel">Rombel</label>
            <input type="number" name="rombel" id="rombel" max="4" min="1">

            <button class="button-submit" type="submit" name="button">SIMPAN</button>
        </form>
    </div>
@endsection