<div class="row">
    <div class="col-lg-6">
        <label  class="form-label">Provinsi</label>
        <select wire:change="ambilKota" class="form-select" name="provinsi" wire:model='provinsi'>
            <option value="null" disabled selected>--pilih satu--</option>
            @foreach ($list_provinsi as $p)
                <option value="{{ $p['id'].'/'.$p['name'] }}">{{ $p['name'] }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-lg-6" >
        <label  class="form-label">Kota</label>
        <select name="kota" class="form-select">
            <option value="null" disabled selected>--pilih satu--</option>
            @foreach ($list_kota as $k)
                <option value="{{ $k['name'] }}">{{ $k['name'] }}</option>
            @endforeach
        </select>
    </div>
</div>