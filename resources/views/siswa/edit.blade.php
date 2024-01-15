@extends('layout.main')
@section('content')
    <div class="container-form">
        <h2 align="center">Edit Data Siswa</h2>

        @if ($errors->any())
            <p class="text-danger">{{ session('error') }}</p>
        @endif

        <form action="/siswa/update/{{ $siswa->id }}" method="POST">
            @csrf
            <label for="nis">NIS</label>
            <input type="text" name="nis" id="nis" value="{{ $siswa->nis }}">

            <label for="nama_siswa">Nama Siswa</label>
            <input type="text" name="nama_siswa" id="nama_siswa" value="{{ $siswa->nama_siswa }}">

            <label>Jenis Kelamin</label>
            <input type="radio" name="jk" value="L" {{ $siswa->jk == 'L' ? 'checked' : '' }}>Laki-laki
            <input type="radio" name="jk" value="P" {{ $siswa->jk == 'P' ? 'checked' : '' }}>Perempuan

            <label for="alamat">Alamat</label>
            <textarea name="alamat" rows="5" id="alamat">{{ $siswa->alamat }}</textarea>

            <label for="kelas_id">Kelas</label>
            <select name="kelas_id" id="kelas_id">
                @foreach ($kelas as $k)
                    @if ($siswa->kelas_id == $k->id)
                        <option value="{{ $k->id }}" selected>{{ $k->kelas }} {{ $k->jurusan }}
                            {{ $k->rombel }}</option>
                    @else
                        <option value="{{ $k->id }}">{{ $k->kelas }} {{ $k->jurusan }}
                            {{ $k->rombel }}</option>
                    @endif
                @endforeach
            </select>

            <label for="password">Password</label>
            <input type="password" name="password" value="{{ $siswa->password }}" id="password">

            <button class="button-submit" type="submit">UBAH</button>
        </form>
    </div>
@endsection
