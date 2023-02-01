<div>
    @if (session()->has('message'))
        @php
            $alert = explode('|', session('message'));
        @endphp
        <div class="alert alert-{{ $alert[0] }} alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <i data-feather="alert-circle" class="w-6 h-6 mr-2"></i>
            {{ $alert[1] }}
        </div>
    @endif
</div>
