<div>
    <div class="content-header">
        <div class="container-fluid">
            <h1 class="m-0">Daily Bonus</h1>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            @if ($daily)
                <div class="alert alert-danger p-1">
                    <form wire:submit.prevent="submit">
                        <h4 class="ml-2">Form Input</h4>
                        <div class="overflow-auto" style="height: 190px">
                            <table class="table table-borderless">
                                @foreach ($daily as $i => $row)
                                    <tr>
                                        <td>
                                            <input type="text" class="form-control"
                                                wire:model.defer="daily.{{ $i }}.date" autocomplete="off"
                                                readonly>
                                        </td>
                                        <td>
                                            <input type="number" step="any" min="0" class="form-control"
                                                wire:model.defer="daily.{{ $i }}.bonus" autocomplete="off">
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                        <br>
                        <input type="submit" value="Submit" class="btn btn-success ml-2">
                    </form>
                </div>
            @endif
            <div class="card card-default color-palette-box">
                <div class="card-body table-responsive">
                    <table class="table table-bordered table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Date</th>
                                <th>Persen</th>
                                <th>Timestamp</th>
                                <th style="width: 10px"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $index => $row)
                                <tr>
                                    <td>{{ ++$no }}</td>
                                    <td>{{ $row->date }}</td>
                                    <td>{{ $row->amount }} % </td>
                                    <td>{{ $row->created_at }}</td>
                                    <td class="text-rigth">
                                        @if ($delete == $row->id)
                                            <a href="javascript:;" class="btn btn-danger" wire:click="delete">Yes,
                                                Delete</a>
                                            <a href="javascript:;" class="btn btn-warning" wire:click="setDelete">Cancel
                                                Delete</a>
                                        @else
                                            <a href="javascript:;" class="btn btn-secondary"
                                                wire:click="setDelete({{ $row->id }})">Delete</a>
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
            <x-info />
            <x-alert />
        </div>
    </section>
</div>
