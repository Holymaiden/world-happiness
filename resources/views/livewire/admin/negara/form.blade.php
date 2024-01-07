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
                        <input type="text" class="form-control" name="nama" wire:model="nama">
                    </div>
                    <div class="form-group">
                        <label>Flag</label>
                        <div class="selectgroup selectgroup-pills">
                            @foreach ($flags as $v)
                                <label class="selectgroup-item">
                                    <input type="radio" name="icon-input" value="{{ $v }}"
                                        class="selectgroup-input" wire:model="flag">
                                    <span
                                        class="selectgroup-button
                                        selectgroup-button-icon"><i
                                            style="width: 18px; height: 18px; line-height: 18px;"
                                            class="flag-icon flag-icon-{{ $v }}"></i></span>
                                </label>
                            @endforeach
                        </div>
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
