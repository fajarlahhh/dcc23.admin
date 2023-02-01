<div>
    <div class="content-header">
        <div class="container-fluid">
            <h1 class="m-0">Change Password</h1>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <form wire:submit.prevent="submit">
                <div class="card card-default color-palette-box">
                    <div class="card-body">
                        <div class="form-group">
                            <label class="form-label">Old Password</label>
                            <input type="password" class="form-control" wire:model.defer="oldPassword" required
                                autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label class="form-label">New Password</label>
                            <input type="password" class="form-control" wire:model.defer="newPassword" required
                                autocomplete="off">
                        </div>
                    </div>
                    <div class="card-footer">
                        <input type="submit" value="Submit" class="btn btn-success">
                    </div>
                </div>
            </form>
            <x-info />
            <x-alert />
        </div>
    </section>
</div>
