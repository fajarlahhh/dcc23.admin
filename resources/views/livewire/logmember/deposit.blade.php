<div>
    <div class="content-header">
        <div class="container-fluid">
            <h1 class="m-0">Member Log Deposit</h1>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary card-tabs">
                <div class="card-body">
                    <select class="form-control" data-placeholder="Select a member" wire:model.lazy="member"
                        data-dropdown-css-class="select2-purple">
                        <option value="">-- Choose Member --</option>
                        @foreach (\App\Models\User::all() as $row)
                            <option value="{{ $row->getKey() }}"> {{ $row->username }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="card card-default color-palette-box">
                <div class="card-header">
                    <div class="card-tools form-inline">
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
                    </div>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-bordered table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Datetime</th>
                                <th>From</th>
                                <th>To Wallet</th>
                                <th>Amount</th>
                                <th>Type</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $i => $row)
                                <tr>
                                    <td>
                                        {{ ++$i }}</td>
                                    <td>
                                        {{ $row->created_at }}</td>
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
                                    <td>
                                        @switch($row->registration)
                                            @case(1)
                                                Registration
                                            @break

                                            @case(2)
                                                Reinvest
                                            @break

                                            @default
                                                Deposit
                                            @break
                                        @endswitch
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
