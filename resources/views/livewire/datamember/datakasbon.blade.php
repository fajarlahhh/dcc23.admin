<div>
    <div class="content-header">
        <div class="container-fluid">
            <h1 class="m-0">Kas Bon</h1>
        </div>
    </div>
    <x-info />
    <x-alert />

    <section class="content">
        <div class="container-fluid">
            <div class="card card-default color-palette-box">
                <div class="card-header">
                    <h3 class="card-title">
                        <form wire:submit.prevent="submit" class="form-inline">
                            <select class="form-control" data-placeholder="Select a member" wire:model.defer="insert"
                                data-dropdown-css-class="select2-purple">
                                <option value="">-- Pilih User --</option>
                                @foreach (\App\Models\User::whereNull('kas_bon')->whereNotNull('upline_id')->get() as $row)
                                    <option value="{{ $row->getKey() }}"> {{ $row->username }}</option>
                                @endforeach
                            </select>&nbsp;
                            <input type="submit" class="btn btn-success" value="Insert">
                        </form>
                    </h3>
                    <div class="card-tools form-inline">
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
                                <th>Wallet</th>
                                <th>Package</th>
                                <th>Upline</th>
                                <th>Sponsor</th>
                                <th style="width: 10px"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $index => $row)
                                <tr>
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
                                    <td>
                                        {{ substr($row->wallet, 0, 4) . '....' . substr($row->wallet, -4) }}
                                    </td>
                                    <td>
                                        {{ $row->package->value }}</td>
                                    <td>
                                        {{ $row->upline->username }}
                                    </td>
                                    <td>
                                        {{ $row->sponsor->username }}
                                    </td>
                                    <td>
                                        @if ($delete == $row->id)
                                            <a href="javascript:;" class="btn btn-danger" wire:click="delete">Yes,
                                                Delete</a>
                                            <a href="javascript:;" class="btn btn-warning"
                                                wire:click="setDelete">Cancel, Delete</a>
                                        @else
                                            <a href="javascript:;" class="btn btn-danger"
                                                wire:click="setDelete({{ $row->id }})">Delete Kas Bon</a>
                                        @endif
                                    </td>
                                </tr>
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
    @push('scripts')
        <script>
            $('.select2').select2()
        </script>
    @endpush
</div>
