<div>
    <div class="content-header">
        <div class="container-fluid">
            <h1 class="m-0">Request Activation</h1>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="card card-default color-palette-box">
                <div class="card-header">
                    <div class="card-tools form-inline">
                        <select class="form-control" style="width: 100px" wire:model="status">
                            <option value="1">Waiting</option>
                            <option value="2">Processed</option>
                        </select>&nbsp;
                        @if ($status == 2)
                            <input class="form-control" style="width: 160px" type="date" wire:model.lazy="date"
                                data-single-mode="true">
                        @endif
                    </div>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-bordered table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Datetime</th>
                                <th>Username</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Sponsor</th>
                                <th>From</th>
                                <th>To Wallet</th>
                                <th>Type</th>
                                <th>Package</th>
                                @if ($status == 1)
                                    <th style="width: 10px"></th>
                                @else
                                    <th style="width: 10px">Timestamp</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $index => $row)
                                <tr>
                                    <td>
                                        {{ ++$i }}</td>
                                    <td>
                                        {{ $row->created_at }}</td>
                                    <td>
                                        {{ $row->user->username }}</td>
                                    <td>
                                        {{ $row->user->name }}</td>
                                    <td>{{ $row->user->phone }}</td>
                                    <td>
                                        {{ $row->user->sponsor ? $row->user->sponsor->username : '' }}
                                    </td>
                                    <td>
                                        Wallet : {{ $row->from_wallet }}<br>
                                        TXID : {{ $row->txid }}
                                    </td>
                                    <td>
                                        {{ $row->to_wallet }}
                                    </td>
                                    <td>
                                        {{ $row->registration == 1 ? 'New' : 'Reinvest' }}</td>
                                    <td>
                                        {{ $row->amount }}</td>
                                    <td>
                                        @if ($status == 1)
                                            @if ($activate == $row->id)
                                                <a href="javascript:;" class="btn btn-success" wire:click="active">Yes,
                                                    Activate</a>
                                                <a href="javascript:;" class="btn btn-secondary"
                                                    wire:click="setActivate">Cancel</a>
                                            @elseif ($delete == $row->id)
                                                <a href="javascript:;" class="btn btn-success" wire:click="delete">Yes,
                                                    Delete</a>
                                                <a href="javascript:;" class="btn btn-secondary"
                                                    wire:click="setDelete">Cancel</a>
                                            @else
                                                <a href="javascript:;" class="btn btn-secondary"
                                                    wire:click="setActivate({{ $row->id }})">Activate
                                                </a>
                                                <a href="javascript:;" class="btn btn-secondary"
                                                    wire:click="setDelete({{ $row->id }})">Delete</a>
                                            @endif
                                        @else
                                            {{ $row->processed_at }}<br>
                                            By : {{ $row->admin ? $row->admin->name : null }}
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-md-6">&nbsp;</div>
                        <div class="col-md-6 text-right">
                            Total Data : {{ $data->count() }}
                        </div>
                    </div>
                </div>
            </div>
            <x-info />
            <x-alert />
        </div>
    </section>
</div>
