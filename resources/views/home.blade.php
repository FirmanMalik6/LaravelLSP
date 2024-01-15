@extends('layout.main')
@section('content')
    <center>
        <h1>
            Selamat Datang {{ session('role') }},
            @if (session('role') == 'guru')
                {{ session('nama_guru') }}
            @elseif (session('role') == 'siswa')
                {{ session('nama_siswa') }}
            @else
                {{ session('id_admin') }}
            @endif
        </h1>
    </center>
@endsection
