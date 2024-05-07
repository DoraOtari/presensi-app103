@extends('admin.bootstrap5')
@section('konten')
    <div class="col-lg-5 mt-3 mx-auto">
        <div class="card shadow-sm">
            <div class="card-body">
                <h4 class="card-title">Data Jabatan</h4>
                {{-- bs5-table-default --}}
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col">Nama Jabatan</th>
                                <th scope="col">Status Jabatan</th>
                                <th scope="col">Gaji Jabatan</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            @foreach ($jabatan as $jb)
                                <tr>
                                    <td>{{ $loop->iteration }}.</td>
                                    <td>{{ $jb->nama_jabatan }}</td>
                                    <td>{{ $jb->status_jabatan }}</td>
                                    <td>Rp. {{ number_format($jb->gaji_jabatan,2,",",".")  }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
@endsection
