<?php

namespace App\Http\Livewire\Logmember;

use App\Models\Deposit as ModelsDeposit;
use Livewire\Component;

class Deposit extends Component
{
    public $member, $date;

    public function mount()
    {
        $this->date = $this->date ?: date('Y-m-d');
    }

    public function render()
    {
        return view('livewire.logmember.deposit', [
            'data' => ModelsDeposit::with('user')->when($this->member, fn($q) => $q->where('user_id', $this->member))->whereNotNull('processed_at')->where('created_at', 'like', $this->date . '%')->get(),
        ]);
    }
}
