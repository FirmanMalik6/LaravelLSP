@extends('layout.main')
@section('content')
    <div class="container-form">
        <h2 align="center">Edit Data Guru</h2>

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <p class="alert">{{ $error }}</p>
            @endforeach
        @endif

        <form action="/guru/update/{{ $guru->id }}" method="POST">
            @csrf
            <label for="nip">NIP</label>
            <input type="text" name="nip" id="nip" value="{{ $guru->nip }}">

            <label for="nama_guru">Nama Guru</label>
            <input type="text" name="nama_guru" id="nama_guru" value="{{ $guru->nama_guru }}">

            <label>Jenis Kelamin</label>
            <input type="radio" name="jk" id="L" value="L"
                {{ $guru->jk == 'L' ? 'checked' : '' }}>Laki-laki
            <input type="radio" name="jk" id="P" value="P"
                {{ $guru->jk == 'P' ? 'checked' : '' }}>Perempuan

            <label for="alamat">Alamat</label>
            <textarea name="alamat" id="alamat" rows="5">{{ $guru->alamat }}</textarea>

            <label for="password">Password</label>
            <input type="password" name="password" id="password" value="{{ $guru->password }}">

            <button class="button-submit" type="submit">UBAH</button>
        </form>
    </div>
@endsection
