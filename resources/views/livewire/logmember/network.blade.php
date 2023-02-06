<div>
    <div class="content-header">
        <div class="container-fluid">
            <h1 class="m-0">Member Log Deposit</h1>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="card card-default color-palette-box">
                <div class="card-header">
                    <div class="card-tools form-inline">
                        <select class="form-control" data-placeholder="Select a member" wire:model.lazy="username"
                            data-dropdown-css-class="select2-purple">
                            <option value="">-- Choose Member --</option>
                            @foreach (\App\Models\User::all() as $row)
                                <option value="{{ $row->getKey() }}"> {{ $row->username }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="card-body table-responsive">
                    <table class="table">
                        <tr>
                            @if ($data)
                                <td colspan="4" class="text-center" style="width: 100%">
                                    <img src="/dist/img/logo.png" alt=""
                                        style="display: block;margin-left: auto;margin-right: auto; height:50px">
                                    {{ $data->username }} - <small>{{ $data->name }}</small>
                                    <br>
                                    {{ number_format((int) $data->valid_left - (int) $data->invalidLeft->sum('amount')) }}
                                    |
                                    {{ number_format((int) $data->valid_right - (int) $data->invalidRight->sum('amount')) }}
                                </td>
                            @else
                                <td>
                                    &nbsp;<br>
                                    &nbsp;<br>
                                    &nbsp;
                                </td>
                            @endif
                        </tr>
                        <tr>
                            <td colspan="2" class="text-center" style="width: 50%">
                                @php
                                    $downline1Left = $data->downline->filter(function ($item) {
                                        return false !== stristr(substr($item->network, -1), 'l');
                                    });
                                @endphp
                                @if ($downline1Left->count() > 0)
                                    <img src="/dist/img/logo.png" alt=""
                                        style="display: block;margin-left: auto;margin-right: auto; height:50px">
                                    {{ $downline1Left->first()->username }} -
                                    <small>{{ $downline1Left->first()->name }}</small>
                                    <br>
                                    {{ number_format((int) $downline1Left->first()->valid_left - (int) $downline1Left->first()->invalidLeft->sum('amount')) }}
                                    |
                                    {{ number_format((int) $downline1Left->first()->valid_right - (int) $downline1Left->first()->invalidRight->sum('amount')) }}
                                @else
                                    &nbsp;<br>
                                    &nbsp;<br>
                                    &nbsp;
                                @endif
                            </td>
                            <td colspan="2" class="text-center" style="width: 50%">
                                @php
                                    $downline1Right = $data->downline->filter(function ($item) {
                                        return false !== stristr(substr($item->network, -1), 'r');
                                    });
                                @endphp
                                @if ($downline1Right->count() > 0)
                                    <img src="/dist/img/logo.png" alt=""
                                        style="display: block;margin-left: auto;margin-right: auto; height:50px">
                                    {{ $downline1Right->first()->username }} -
                                    <small>{{ $downline1Right->first()->name }}</small>
                                    <br>
                                    {{ number_format((int) $downline1Right->first()->valid_left - (int) $downline1Right->first()->invalidLeft->sum('amount')) }}
                                    |
                                    {{ number_format((int) $downline1Right->first()->valid_right - (int) $downline1Right->first()->invalidRight->sum('amount')) }}
                                @else
                                    &nbsp;<br>
                                    &nbsp;<br>
                                    &nbsp;
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center" style="width: 25%">
                                @if ($downline1Left->first())
                                    @php
                                        $downline2Left = $downline1Left->first()->downline->filter(function ($item) {
                                            return false !== stristr(substr($item->network, -1), 'l');
                                        });
                                    @endphp
                                    @if ($downline2Left->count() > 0)
                                        <img src="/dist/img/logo.png" alt=""
                                            style="display: block;margin-left: auto;margin-right: auto; height:50px">
                                        {{ $downline2Left->first()->username }} -
                                        <small>{{ $downline2Left->first()->name }}</small>
                                        <br>
                                        {{ number_format((int) $downline2Left->first()->valid_left - (int) $downline2Left->first()->invalidLeft->sum('amount')) }}
                                        |
                                        {{ number_format((int) $downline2Left->first()->valid_right - (int) $downline2Left->first()->invalidRight->sum('amount')) }}
                                        <br>
                                        @if ($downline2Left->first()->downline->count() > 0)
                                            <a href="/lognetworkusername={{ $downline2Left->first()->username }}"
                                                class="btn btn-sm btn-secondary">Next</a>
                                        @endif
                                    @endif
                                @else
                                    &nbsp;<br>
                                    &nbsp;<br>
                                    &nbsp;
                                @endif
                            </td>
                            <td class="text-center" style="width: 25%">
                                @if ($downline1Left->first())
                                    @php
                                        $downline2Right = $downline1Left->first()->downline->filter(function ($item) {
                                            return false !== stristr(substr($item->network, -1), 'r');
                                        });
                                    @endphp
                                    @if ($downline2Right->count() > 0)
                                        <img src="/dist/img/logo.png" alt=""
                                            style="display: block;margin-left: auto;margin-right: auto; height:50px">
                                        {{ $downline2Right->first()->username }} -
                                        <small>{{ $downline2Right->first()->name }}</small>
                                        <br>
                                        {{ number_format((int) $downline2Right->first()->valid_left - (int) $downline2Right->first()->invalidLeft->sum('amount')) }}
                                        |
                                        {{ number_format((int) $downline2Right->first()->valid_right - (int) $downline2Right->first()->invalidRight->sum('amount')) }}
                                        <br>
                                        @if ($downline2Right->first()->downline->count() > 0)
                                            <a href="/lognetworkusername={{ $downline2Right->first()->username }}"
                                                class="btn btn-sm btn-secondary">Next</a>
                                        @endif
                                    @endif
                                @else
                                    &nbsp;<br>
                                    &nbsp;<br>
                                    &nbsp;
                                @endif
                            </td>
                            <td class="text-center" style="width: 25%">
                                @if ($downline1Right->first())
                                    @php
                                        $downline12Left = $downline1Right->first()->downline->filter(function ($item) {
                                            return false !== stristr(substr($item->network, -1), 'l');
                                        });
                                    @endphp
                                    @if ($downline12Left->count() > 0)
                                        <img src="/dist/img/logo.png" alt=""
                                            style="display: block;margin-left: auto;margin-right: auto; height:50px">
                                        {{ $downline12Left->first()->username }} -
                                        <small>{{ $downline12Left->first()->name }}</small>
                                        <br>
                                        {{ number_format((int) $downline12Left->first()->valid_left - (int) $downline12Left->first()->invalidLeft->sum('amount')) }}
                                        |
                                        {{ number_format((int) $downline12Left->first()->valid_right - (int) $downline12Left->first()->invalidRight->sum('amount')) }}
                                        <br>
                                        @if ($downline12Left->first()->downline->count() > 0)
                                            <a href="/lognetworkusername={{ $downline12Left->first()->username }}"
                                                class="btn btn-sm btn-secondary">Next</a>
                                        @endif
                                    @endif
                                @else
                                    &nbsp;<br>
                                    &nbsp;<br>
                                    &nbsp;
                                @endif
                            </td>
                            <td class="text-center" style="width: 25%">
                                @if ($downline1Right->first())
                                    @php
                                        $downline12Right = $downline1Right->first()->downline->filter(function ($item) {
                                            return false !== stristr(substr($item->network, -1), 'r');
                                        });
                                    @endphp
                                    @if ($downline12Right->count() > 0)
                                        <img src="/dist/img/logo.png" alt=""
                                            style="display: block;margin-left: auto;margin-right: auto; height:50px">
                                        {{ $downline12Right->first()->username }} -
                                        <small>{{ $downline12Right->first()->name }}</small>
                                        <br>
                                        {{ number_format((int) $downline12Right->first()->valid_left - (int) $downline12Right->first()->invalidLeft->sum('amount')) }}
                                        |
                                        {{ number_format((int) $downline12Right->first()->valid_right - (int) $downline12Right->first()->invalidRight->sum('amount')) }}
                                        <br>
                                        @if ($downline12Right->first()->downline->count() > 0)
                                            <a href="/lognetworkusername={{ $downline12Right->first()->username }}"
                                                class="btn btn-sm btn-secondary">Next</a>
                                        @endif
                                    @endif
                                @else
                                    &nbsp;<br>
                                    &nbsp;<br>
                                    &nbsp;
                                @endif
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <x-info />
            <x-alert />
        </div>
    </section>
</div>
