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
        $wd = Withdrawal::findOrFail($this->process);
        if ($wd->processed_at == null) {
            $wd->processed_at = now();
            $wd->admin_id = auth()->id();
            $wd->txid = $this->txid;
            $wd->save();
        }
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
            'data' => Withdrawal::with('user')->when($this->status == 1, fn ($q) => $q->whereNull('processed_at'))->when($this->status == 2, fn ($q) => $q->where('processed_at', 'like', $this->year . '-' . $this->month . '%'))->orderBy('created_at')->get(),
        ]);
    }
}
