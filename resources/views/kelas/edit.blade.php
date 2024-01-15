@extends('layout.main')
@section('content')
    <div class="container-form">
        <h2 align="center">Edit Data Kelas</h2>

        @if ($errors->any())
            <p class="text-danger">{{ session('error') }}</p>
        @endif

        <form action="/kelas/update/{{ $kelas->id }}" method="POST">
            @csrf
            <tr>
                <label for="nip">NIP</label>
                <select name="kelas" id="kelas">
                    @foreach ($tingkat_kelas as $k)
                        @if ($kelas->kelas == $k)
                            <option value="{{ $k }}" selected>{{ $k }}</option>
                        @else
                            <option value="{{ $k }}">{{ $k }}</option>
                        @endif
                    @endforeach
                </select>

                <label for="jurusan">Jurusan</label>
                <select name="jurusan" id="jurusan">
                    @foreach ($jurusan as $j)
                        @if ($kelas->jurusan == $j)
                            <option value="{{ $j }}" selected>{{ $j }}</option>
                        @else
                            <option value="{{ $j }}">{{ $j }}</option>
                        @endif
                    @endforeach
                </select>

                <label for="rombel">Rombel</label>
                <input type="number" name="rombel" id="rombel" max="3" min="1"
                    value="{{ $kelas->rombel }}">
            </tr>

            <button class="button-submit" type="submit">UBAH</button>
        </form>
    </div>
@endsection
