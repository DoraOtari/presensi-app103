@extends('admin.bootstrap5')
@section('konten')
    <div class="container-fluid mt-2">
        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li class="text-danger">{{ $error }}</li>
                @endforeach
            </ul>
        @endif
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
                <label for="jabatan_id" class="form-label">Jabatan</label>
                <select name="jabatan_id" id="jabatan_id" class="form-select">
                    <option selected disabled>--pilih satu--</option>
                    @foreach ($jabatan as $item)
                    <option value="{{ $item->id }}">{{ $item->nama_jabatan }}</option>
                    @endforeach
                </select>
            </div>
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
