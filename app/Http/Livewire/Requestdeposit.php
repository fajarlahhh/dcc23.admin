<?php

namespace App\Http\Livewire;

use App\Models\Balance;
use App\Models\Deposit;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Requestdeposit extends Component
{
    public $status = 1, $year, $month, $process, $delete;
    protected $queryString = ['status', 'year', 'month'];

    public function setProcess($process = null)
    {
        $this->process = $process;
    }

    public function setDelete($delete = null)
    {
        $this->delete = $delete;
    }

    public function delete()
    {
        Deposit::whereId($this->delete)->delete();
    }

    public function done()
    {
        DB::transaction(function ($q) {
            $deposit = Deposit::findOrFail($this->process);
            if ($deposit->processed_at == null) {
                $deposit->processed_at = now();
                $deposit->admin_id = auth()->id();
                $deposit->save();

                $balance = new Balance();
                $balance->description = "Top up";
                $balance->amount = $deposit->amount;
                $balance->user_id = $deposit->user_id;
                $balance->save();
            }
        });
    }

    public function mount()
    {
        $this->year = $this->year ?: date('Y');
        $this->month = $this->month ?: date('m');
    }

    public function render()
    {
        return view('livewire.requestdeposit', [
            'i' => 0,
            'data' => Deposit::with('user')->when($this->status == 1, fn($q) => $q->whereNull('processed_at'))->when($this->status == 2, fn($q) => $q->where('processed_at', 'like', $this->year . '-' . $this->month . '%'))->whereNotNull('from_wallet')->whereNull('registration')->orderBy('created_at')->get(),
        ]);
    }
}
