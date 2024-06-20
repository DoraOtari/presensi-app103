@extends('admin.bootstrap5')
@section('konten')
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <td>Tanggal</td>
                    <td>Nama</td>
                    <td>Jam Masuk</td>
                    <td>Jam Pulang</td>
                    <td>Foto Masuk</td>
                    <td>Foto Pulang</td>
                    <td>Lokasi Masuk</td>
                    <td>Lokasi Pulang</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($riwayat as $item)
                    <tr>
                        <td>{{ $item->tanggal }}</td>
                        <td>{{ $item->user->name }}</td>
                        <td>{{ $item->jam_masuk }}</td>
                        <td>{{ $item->jam_pulang }}</td>
                        <td>
                            <img src="{{ asset('storage/'.$item->foto_masuk)  }}" width="55">
                        </td>
                        <td>
                            <img src="{{ asset('storage/'.$item->foto_pulang) }}" width="55">
                        </td>
                        <td>{{ $item->lokasi_masuk }}</td>
                        <td>{{ $item->lokasi_pulang }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection