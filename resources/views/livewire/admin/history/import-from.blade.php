<div class="modal fade" tabindex="-1" role="dialog" id="formImport" wire:ignore>
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Import</h5>
            </div>
            <div class="modal-body">
                <div class="empty-state" data-height="400">
                    <div wire:loading wire:target='import' style="text-align: -webkit-center;">
                        <div class="empty-state-icon bg-primary">
                            <i class="fas fa-spinner fa-spin"></i>
                        </div>
                        <h2>Importing</h2>
                        <p class="lead">
                            Please wait while your data is being imported
                        </p>
                        <div class="alert alert-warning">
                            This may take a while.
                            The import process time depends on the amount of data.
                        </div>
                    </div>
                    <div wire:loading.remove wire:target='import' style="text-align: -webkit-center;">
                        <div class="empty-state-icon bg-success">
                            <i class="fas fa-file-excel"></i>
                        </div>
                        <h2>Upload Excel</h2>
                        <p class="lead">
                            Please upload your excel file
                        </p>
                        <form wire:submit.prevent="import" class="needs-validation">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" wire:model="form">
                                <label class="custom-file-label text-left">Choose File</label>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-primary" wire:click="import">Import <i wire:loading.delay.longer
                        wire:target="form" class="fas fa-spinner fa-spin"></i></button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
