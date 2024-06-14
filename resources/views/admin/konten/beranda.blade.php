@extends('admin.bootstrap5')
@section('konten')
    <div class="row justify-content-center mt-5" >
        <div class="col-5">
            <h1><i class="bi bi-webcam"></i> Presensi App</h1>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Odio accusantium, ipsam unde placeat beatae doloribus fugit deserunt molestias expedita, sed voluptate commodi. Et, natus provident unde doloremque fugit odit impedit dolores commodi itaque quisquam eum suscipit, eaque fugiat tempore. Amet iure quibusdam facere odit laboriosam quae, ex perspiciatis vitae illum reiciendis, beatae ullam veniam culpa ea maxime dolorem. Nam deserunt incidunt aut non ad natus deleniti aspernatur unde? Natus, quam.</p>
            <a href="{{ url('/absen') }}" class="btn btn-primary btn-lg"><i class="bi-camera"></i></a>
        </div>
        <div class="col-4">
            <img src="{{ asset('gambar-dashboard.png') }}" alt="">
        </div>
    </div>
@endsection