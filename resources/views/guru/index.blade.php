@extends('layout.main')
@section('content')
    <center>
        <b>
            <h2>LIST DATA GURU</h2>
            <a href="/guru/create" class="button-primary">TAMBAH DATA</a>
            @if (session('success'))
                <div class="alert alert-success"><span class="closebtn" id="closeBtn">&times;</span>{{ session('success') }}
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger"><span class="closebtn" id="closeBtn">&times;</span>{{ session('error') }}
                </div>
            @endif
            <table class="table-data">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>NIP</th>
                        <th>Nama Guru</th>
                        <th>Jenis Kelamin</th>
                        <th>Alamat</th>
                        <th>Password</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($guru as $g)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $g->nip }}</td>
                            <td>{{ $g->nama_guru }}</td>
                            <td>{{ $g->jk == 'L' ? 'Laki-Laki' : 'Perempuan' }}</td>
                            <td>{{ $g->alamat }}</td>
                            <td>{{ $g->password }}</td>
                            <td style="text-align: center">
                                <a href="/guru/edit/{{ $g->id }}" class="button-warning">EDIT</a>
                                <a href="/guru/destroy/{{ $g->id }}" onclick="return confirm('Yakin Hapus?')"
                                    class="button-danger">HAPUS</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </b>
    </center>
@endsection
