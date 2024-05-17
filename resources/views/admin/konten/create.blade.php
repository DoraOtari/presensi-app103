@extends('admin.bootstrap5')
@section('konten')
    <div class="container-fluid mt-2">
        <h4><i class="bi-person"></i> Form Karyawan</h4>
        <form action="{{ url('/karyawan') }}" method="post">
            @csrf
            <div class="mb-3">
                <label class="form-label">Nama Karyawan</label>
                <input type="text" name="nama" class="form-control" placeholder="masukan nama karyawan">
            </div>
            <livewire:nik-otomatis />
            <livewire:api-daerah />
            <div class="mb-3">
                <div class="label form-label">Alamat</div>
                <textarea name="alamat" placeholder="masukan alamat" class="form-control" rows="3"></textarea>
            </div>
            <div class="text-end">
                <button type="submit" class="btn btn-dark">submit</button>
            </div>
        </form>
    </div>
@endsection
