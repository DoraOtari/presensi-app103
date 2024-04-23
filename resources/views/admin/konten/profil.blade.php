@extends('admin.bootstrap5')
@section('konten')
    <div class="col-lg-6 mx-auto mt-3">
        <div class="card shadow">
            <div class="card-body">
                <h4 class="card-title"><i class="bi bi-person-bounding-box"></i> Upload Profil</h4>
                <livewire:upload-file />
            </div>
        </div>
    </div>
@endsection