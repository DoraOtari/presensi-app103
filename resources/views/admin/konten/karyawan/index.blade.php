@extends('admin.bootstrap5')
@section('konten')
    <div class="mx-2 mt-3">
        @if (session('notif'))
            <div class="alert alert-success" role="alert">
                <strong><i class="bi-bell"></i></strong> {{ session('notif') }}
            </div>
        @endif
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
                @foreach ($karyawan as $item)
                    <tr>
                        <td>
                            <img src="{{ asset('storage/' . $item->user->avatar) }}" width="45">
                        </td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->user->email }}</td>
                        <td>{{ $item->jabatan->nama_jabatan }}</td>
                        <td>
                            <a href='{{ url("karyawan/$item->id") }}'>
                                <i class="bi-eye text-primary"></i>
                            </a>
                        </td>
                        <td>
                            <a href='{{ url("karyawan/$item->id/edit") }}'>
                                <i class="bi-pen text-success"></i>
                            </a>
                        </td>
                        <td>
                            <form action='{{ url("karyawan/$item->id") }}' method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn">
                                    <i class="bi-trash text-danger"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
@endsection
