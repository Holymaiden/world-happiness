@teleport('body')
    <div class="modal fade" tabindex="-1" role="dialog" id="formData">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ $title }}</h5>
                </div>
                <div class="modal-body">
                    <input type="text" class="form-control" name="id" wire:model="id" hidden>
                    <div class="form-group">
                        <label>Negara</label>
                        <select class="form-control" name="negara_id" wire:model="negara_id">
                            <option value="">Pilih Negara</option>
                            @foreach ($negara as $v)
                                <option value="{{ $v->id }}">{{ $v->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tahun</label>
                        <select class="form-control" name="tahun" wire:model="tahun">
                            <option value="">Pilih Tahun</option>
                            @foreach ($years as $v)
                                <option value="{{ $v }}">{{ $v }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Ekonomi</label>
                        <input type="number" class="form-control" name="ekonomi" wire:model="ekonomi">
                    </div>
                    <div class="form-group">
                        <label>Kesehatan</label>
                        <input type="number" class="form-control" name="kesehatan" wire:model="kesehatan">
                    </div>
                    <div class="form-group">
                        <label>Kebebasan</label>
                        <input type="number" class="form-control" name="kebebasan" wire:model="kebebasan">
                    </div>
                    <div class="form-group">
                        <label>Score</label>
                        <input type="number" class="form-control" name="score" wire:model="score">
                    </div>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-primary" wire:click="submitForm">{{ $btnName }}</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endteleport
