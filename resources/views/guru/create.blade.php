@extends('layout.main')
@section('content')
    <div class="container-form">
        <h2 align="center">Tambah Data Guru</h2>

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <p class="text-danger">{{ $error }}</p>
            @endforeach
        @endif

        <form action="/guru/store" method="POST">
            @csrf
            <label for="nip">NIP</label>
            <input type="text" name="nip" id="nip">

            <label for="nama_guru">Nama Guru</label>
            <input type="text" id="nama_guru" name="nama_guru">

            <label>Jenis Kelamin</label>
            <input type="radio" name="jk" value="L">Laki-Laki
            <input type="radio" name="jk" value="P">Perempuan

            <label for="alamat">Alamat</label>
            <textarea name="alamat" id="alamat" rows="5"></textarea>

            <label for="password">Password</label>
            <input type="password" name="password" id="password">

            <button class="button-submit" type="submit" name="button">Simpan</button>
        </form>
    </div>
@endsection
