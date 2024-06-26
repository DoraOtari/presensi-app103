<div>
    <div class="mb-3">
        <label class="form-label"><span class="badge bg-dark">NIK</span></label>
        <input value="{{ $nik }}" type="text" class="form-control-plaintext" name="nik" readonly />
    </div>
    <div class="row">
        <div class="col">
            <div class="mb-3">
                <label class="form-label">Email</label>
                <select wire:model="userId" class="form-select" name="user_id">
                    <option value="null" selected disabled>Select one</option>
                    @foreach ($list_users as $user)
                    <option value="{{ $user->id }}">{{ $user->email }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col">
            <div class="mb-3">
                <label class="form-label">Tanggal Lahir</label>
                <input wire:model="tgl" type="date" class="form-control" name="tanggal_lahir" />
            </div>
        </div>
    </div>
</div>
