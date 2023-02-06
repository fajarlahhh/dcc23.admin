<?php

namespace App\Http\Livewire\Logmember;

use App\Models\Bonus as ModelsBonus;
use Livewire\Component;

class Bonus extends Component
{
    public $member, $date;

    public function mount()
    {
        $this->date = $this->date ?: date('Y-m-d');
    }

    public function render()
    {
        return view('livewire.logmember.bonus', [
            'data' => ModelsBonus::when($this->member, fn($q) => $q->where('user_id', $this->member))->where('created_at', 'like', $this->date . '%')->get(),
        ]);
    }
}
