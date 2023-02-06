<div>
    <div class="content-header">
        <div class="container-fluid">
            <h1 class="m-0">Member Log Bonus</h1>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="card card-default color-palette-box">
                <div class="card-header">
                    <div class="card-tools form-inline">
                        <select class="form-control" data-placeholder="Select a member" wire:model.lazy="member"
                            data-dropdown-css-class="select2-purple">
                            <option value="">-- Choose Member --</option>
                            @foreach (\App\Models\User::all() as $row)
                                <option value="{{ $row->getKey() }}"> {{ $row->username }}</option>
                            @endforeach
                        </select>
                        <input class="form-control" style="width: 160px" type="date" wire:model.lazy="date"
                            data-single-mode="true">
                    </div>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-bordered table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Datetime</th>
                                <th>Username</th>
                                <th>Description</th>
                                <th>Amount</th>
                                <th>Valid</th>
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
                                        {{ $row->user->username }}</td>
                                    <td>
                                        {{ $row->description }}</td>
                                    <td>
                                        {{ number_format($row->amount) }}</td>
                                    <td>
                                        {{ $row->invalid ? 'Invalid' : '' }}
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
