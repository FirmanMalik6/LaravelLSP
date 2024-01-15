@extends('layout.main')
@section('content')
    <div class="content-menu">
        @forelse ($kelas as $k)
            <div class="menu-kelas">
                <div class="kelas-list">
                    <a href="/nilai/kelas/{{ $k->id }}">{{ $k->kelas }} {{ $k->jurusan }}
                        {{ $k->rombel }}</a>
                </div>
            </div>
        @empty
            <div class="menu-class">
                <div class="kelas-list">
                    Anda belum mendapatkan kelas dan mapel
                </div>
            </div>
        @endforelse
    </div>
@endsection
