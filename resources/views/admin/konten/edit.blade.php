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
        <h4><i class="bi-person"></i>Edit Form Karyawan</h4>
        <form action='{{ url("/karyawan/$karyawan->id") }}' method="post">
            @method('put')
            @csrf
            <div class="mb-3">
                <label class="form-label">Nama Karyawan</label>
                <input value="{{ $karyawan->nama }}" type="text" name="nama" class="form-control" placeholder="masukan nama karyawan">
            </div>
            <livewire:nik-otomatis :karyawan="$karyawan" />
            <livewire:api-daerah />
            <div class="mb-3">
                <label for="jabatan_id" class="form-label">Jabatan</label>
                <select name="jabatan_id" id="jabatan_id" class="form-select">
                    <option selected disabled>--pilih satu--</option>
                    @foreach ($jabatan as $item)
                    <option @selected($karyawan->jabatan_id == $item->id ) value="{{ $item->id }}">{{ $item->nama_jabatan }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <div class="label form-label">Alamat</div>
                <textarea name="alamat" placeholder="masukan alamat" class="form-control @error('alamat') is-invalid @enderror" rows="3"></textarea>
                @error('alamat')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="text-end">
                <button type="submit" class="btn btn-dark">submit</button>
            </div>
        </form>
    </div>
@endsection
