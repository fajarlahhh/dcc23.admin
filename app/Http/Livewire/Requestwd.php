<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Withdrawal;
use Illuminate\Support\Facades\DB;

class Requestwd extends Component
{
    public $status = 1, $year, $month, $process, $txid;

    protected $queryString = ['status', 'year', 'month'];

    public function setProcess($process = null)
    {
        $this->process = $process;
    }

    public function submit()
    {
        Withdrawal::where('to_wallet', $this->process)->whereNull('processed_at')->update([
            'processed_at' => now(),
            'admin_id' => auth()->id(),
            'txid' => $this->txid,
        ]);
    }

    public function mount()
    {
        $this->year = $this->year ?: date('Y');
        $this->month = $this->month ?: date('m');
    }

    public function render()
    {
        return view('livewire.requestwd', [
            'i' => 0,
            'data' => Withdrawal::select('to_wallet', DB::raw('sum(amount) amount'))->when($this->status == 1, fn ($q) => $q->whereNull('processed_at'))->when($this->status == 2, fn ($q) => $q->where('processed_at', 'like', $this->year . '-' . $this->month . '%'))->groupBy('to_wallet')->orderBy('created_at')->get(),
        ]);
    }
}
