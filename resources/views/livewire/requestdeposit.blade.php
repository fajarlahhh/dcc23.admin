<div>
    <div class="content-header">
        <div class="container-fluid">
            <h1 class="m-0">Request Deposit</h1>
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
                            <select class="form-control" aria-label="Default select example" wire:model="month">
                                @for ($m = 1; $m <= 12; $m++)
                                    <option value="{{ sprintf('%02s', $m) }}">
                                        {{ DateTime::createFromFormat('!m', $m)->format('F') }}</option>
                                @endfor
                            </select>&nbsp;
                            <select class="form-control" aria-label="Default select example" wire:model="year">
                                @for ($y = 2023; $y <= date('Y'); $y++)
                                    <option value="{{ $y }}">{{ $y }}</option>
                                @endfor
                            </select>
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
                                <th>From</th>
                                <th>To Wallet</th>
                                <th>Amount</th>
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
                                        Wallet : {{ $row->from_wallet }}<br>
                                        TXID : {{ $row->txid }}
                                    </td>
                                    <td>
                                        {{ $row->to_wallet }}
                                    </td>
                                    <td>
                                        {{ number_format($row->amount) }}
                                    </td>
                                    @if ($status == 1)
                                        <td>
                                            @if ($process == $row->id)
                                                <a href="javascript:;" class="btn btn-success" wire:click="done">Yes,
                                                    Process</a>
                                                <a href="javascript:;" class="btn btn-warning"
                                                    wire:click="setProcess">Cancel</a>
                                            @elseif ($delete == $row->id)
                                                <a href="javascript:;" class="btn btn-success" wire:click="delete">Yes,
                                                    Delete</a>
                                                <a href="javascript:;" class="btn btn-warning"
                                                    wire:click="setDelete">Cancel</a>
                                            @else
                                                <a href="javascript:;" class="btn btn-secondary"
                                                    wire:click="setProcess({{ $row->id }})">Process
                                                </a>
                                                <a href="javascript:;" class="btn btn-secondary"
                                                    wire:click="setDelete({{ $row->id }})">Delete
                                                </a>
                                            @endif
                                        </td>
                                    @else
                                        <td>
                                            {{ $row->processed_at }}<br>
                                            By : {{ $row->admin ? $row->admin->name : null }}
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="7">Total</th>
                                <th>{{ number_format($data->sum('amount')) }}</th>
                            </tr>
                        </tfoot>
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
