@extends('layout.main')
@section('content')
    <div class="container-form">
        <h2 align="center">Edit Data Guru</h2>

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <p class="alert">{{ $error }}</p>
            @endforeach
        @endif

        <form action="/guru/update/ {{ $guru->id }}" method="POST">
            @csrf
            <label for="nip">NIP</label>
            <input type="text" name="nip" value="{{ $guru->nip }}" id="nip">

            <label for="nama_guru">Nama Guru</label>
            <input type="text" name="nama_guru" value="{{ $guru->nama_guru }}" id="nama_guru">

            <label>Jenis Kelamin</label>
            <input type="radio" name="jk" value="L" {{ $guru->jk == 'L' ? 'checked' : '' }}>Laki-Laki
            <input type="radio" name="jk" value="P" {{ $guru->jk == 'P' ? 'checked' : '' }}>Perempuan

            <label for="alamat">Alamat</label>
            <textarea name="alamat" rows="5" id="alamat">{{ $guru->alamat }}</textarea>

            <label for="alamat">Password</label>
            <input type="password" name="password" id="password" value="{{ $guru->password }}">

            <button class="button-submit" type="submit">UBAH</button>
        </form>
    </div>
@endsection
