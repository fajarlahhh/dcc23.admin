<div>
    <div class="content-header">
        <div class="container-fluid">
            <h1 class="m-0">Member</h1>
        </div>
    </div>
    <x-info />
    <x-alert />

    <section class="content">
        <div class="container-fluid">
            <div class="card card-default color-palette-box">
                <div class="card-header">
                    <div class="card-tools form-inline">
                        <select class="form-control" style="width: 100px" wire:model="active">
                            <option value="1">All</option>
                            <option value="2">By Date</option>
                        </select>&nbsp;
                        @if ($active == 2)
                            <input class="form-control" style="width: 160px" type="date" wire:model.lazy="activeDate"
                                data-single-mode="true">
                        @endif
                        &nbsp;<input class="form-control" style="width: 160px" type="text" placeholder="Search"
                            wire:model.lazy="search" data-single-mode="true">
                    </div>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-bordered table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Username</th>
                                <th>Show Password</th>
                                <th>PIN</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Wallet</th>
                                <th>Package</th>
                                <th>Upline</th>
                                <th>Sponsor</th>
                                <th>
                                    @if ($exist == 1)
                                        Active
                                    @else
                                        Inactive
                                    @endif
                                </th>
                                <th style="width: 10px"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $index => $row)
                                <tr>
                                    <td>
                                        {{ ++$no }}</td>
                                    <td>
                                        {{ $row->username }}</td>
                                    <td>
                                        {{ $row->first_password }}</td>
                                    <td>
                                        {{ $row->pin }}</td>
                                    <td>
                                        {{ $row->name }}</td>
                                    <td>{{ $row->phone }}</td>
                                    <td>
                                        {{ substr($row->wallet, 0, 4) . '....' . substr($row->wallet, -4) }}
                                    </td>
                                    <td>
                                        {{ $row->package_value }}</td>
                                    <td>
                                        {{ $row->upline->username }}
                                    </td>
                                    <td>
                                        {{ $row->sponsor->username }}
                                    </td>
                                    <td>
                                        @if ($exist == 1)
                                            {{ $row->activated_at }}
                                        @else
                                            {{ $row->deleted_at }}
                                        @endif
                                    </td>
                                    <td>
                                        @if ($exist == 1)
                                            @if ($reset == $row->id)
                                                <a href="javascript:;" class="btn btn-success"
                                                    wire:click="resetPassword">Yes, Reset password</a>
                                                <a href="javascript:;" class="btn btn-warning"
                                                    wire:click="setReset">Cancel, Reset password</a>
                                            @elseif ($delete == $row->id)
                                                <a href="javascript:;" class="btn btn-danger" wire:click="delete">Yes,
                                                    Delete</a>
                                                <a href="javascript:;" class="btn btn-warning"
                                                    wire:click="setDelete">Cancel, Delete</a>
                                            @else
                                                <a href="javascript:;" class="btn btn-secondary"
                                                    wire:click="setReset({{ $row->id }})">Reset
                                                    Pwd</a>
                                                <a href="javascript:;" class="btn btn-danger"
                                                    wire:click="setDelete({{ $row->id }})">Delete</a>
                                            @endif
                                        @else
                                            @if ($restore == $row->id)
                                                <a href="javascript:;" class="btn btn-success"
                                                    wire:click="restore">Restore</a>
                                                <a href="javascript:;" class="btn btn-warning"
                                                    wire:click="setRestore">Cancel</a>
                                            @else
                                                <a href="javascript:;" class="btn btn-secondary"
                                                    wire:click="setRestore({{ $row->id }})">Restore</a>
                                            @endif
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-md-6">{{ $data->links() }}</div>
                        <div class="col-md-6 text-right">Total Data : {{ $data->total() }}</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
