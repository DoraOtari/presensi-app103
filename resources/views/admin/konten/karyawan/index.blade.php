@extends('admin.bootstrap5')
@section('konten')
    <div class="mx-2 mt-3">
        <div class="d-flex justify-content-between">
            <h4><i class="bi-people"></i> Data Karyawan</h4>
            <a href="{{ url('/karyawan/create') }}" class="btn btn-dark"><i class="bi-plus"></i> Create</a>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <td>Avatar</td>
                    <td>Nama</td>
                    <td>Email</td>
                    <td>Jabatan</td>
                    <td>Detail</td>
                    <td>Edit</td>
                    <td>Hapus</td>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection