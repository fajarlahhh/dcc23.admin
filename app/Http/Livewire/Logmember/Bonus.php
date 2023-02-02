<?php

namespace App\Http\Livewire\Logmember;

use App\Models\Bonus as ModelsBonus;
use Livewire\Component;

class Bonus extends Component
{
    public $member, $year, $month;

    public function mount()
    {
        $this->year = $this->year ?: date('Y');
        $this->month = $this->month ?: date('m');
    }

    public function render()
    {
        return view('livewire.logmember.bonus', [
            'data' => $this->member ? ModelsBonus::where('user_id', $this->member)->where('created_at', 'like', $this->year . '-' . $this->month . '%')->get() : collect([]),
        ]);
    }
}
