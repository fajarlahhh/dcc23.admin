<?php

namespace App\Http\Livewire;

use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Dataadmin extends Component
{
    public $username, $name, $delete;
    public function setDelete($delete = null)
    {
        $this->delete = $delete;
    }

    public function delete()
    {
        Admin::whereId($this->delete)->delete();
    }

    public function submit()
    {
        $data = new Admin();
        $data->username = $this->username;
        $data->name = $this->name;
        $data->password = Hash::make($this->username);
        $data->save();

        $this->reset(['username', 'name']);
    }

    public function render()
    {
        return view('livewire.dataadmin', [
            'data' => Admin::get(),
        ]);
    }
}
