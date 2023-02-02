<?php

namespace App\Http\Livewire\Logmember;

use App\Models\Deposit as ModelsDeposit;
use Livewire\Component;

class Deposit extends Component
{
    public $member, $year, $month;

    public function mount()
    {
        $this->year = $this->year ?: date('Y');
        $this->month = $this->month ?: date('m');
    }
    public function render()
    {
        return view('livewire.logmember.deposit', [
            'data' => $this->member ? ModelsDeposit::where('user_id', $this->member)->where('created_at', 'like', $this->year . '-' . $this->month . '%')->orderBy('created_at', 'desc')->get() : collect([]),
        ]);
    }
}
