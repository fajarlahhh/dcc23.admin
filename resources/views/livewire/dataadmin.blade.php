<div>
    <div class="content-header">
        <div class="container-fluid">
            <h1 class="m-0">Admin Data</h1>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="card card-default color-palette-box">
                <div class="card-header bg-info">
                    <form wire:submit.prevent="submit">
                        <h4>Form Input</h4>
                        <div class="form-group">
                            <label class="form-label">Username</label>
                            <input type="text" class="form-control" wire:model.defer="username" required
                                autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control" wire:model.defer="name" required
                                autocomplete="off">
                        </div>
                        <input type="submit" value="Submit" class="btn btn-success ml-2">
                    </form>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-bordered table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Username</th>
                                <th>Name</th>
                                <th>Timestamp</th>
                                <th style="width: 10px"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $key => $row)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $row->username }}</td>
                                    <td>{{ $row->name }}</td>
                                    <td>{{ $row->created_at }}</td>
                                    <td>
                                        @if ($row->username != 'admin')
                                            @if ($delete == $row->id)
                                                <a href="javascript:;" class="btn btn-success" wire:click="delete">Yes,
                                                    Delete</a>
                                                <a href="javascript:;" class="btn btn-secondary"
                                                    wire:click="setDelete">Cancel</a>
                                            @else
                                                <a href="javascript:;" class="btn btn-secondary"
                                                    wire:click="setDelete({{ $row->id }})">Delete
                                                </a>
                                            @endif
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <x-info />
            <x-alert />
        </div>
    </section>
</div>
