<div>
    <div class="text-center">
        <label for="" >Preview Gambar</label>
    </div>
    @if ($photo) 
        <img width="100" class="img-thumbnail d-block mx-auto" src="{{ $photo->temporaryUrl() }}">
    @else
        <img src="https://placehold.co/600x400?text=Preview\nGambar" 
        class="img-thumbnail d-block mx-auto" width="100">
    @endif

    <form action="{{ url('/upload') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="" class="form-label">Upload Foto</label>
            <input wire:model="photo" class="form-control" type="file" name="foto" id="">
        </div>
        
        <div class="text-end">
            <button class="btn btn-dark" type="submit">Submit</button>
        </div>
    </form>
</div>
