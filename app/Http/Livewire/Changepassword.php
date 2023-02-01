<?php

namespace App\Http\Livewire;

use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Changepassword extends Component
{
    public $oldPassword, $newPassword;

    public function submit()
    {
        $this->validate(
            [
                'oldPassword' => 'required',
                'newPassword' => 'required',
            ]
        );

        if (Hash::check($this->oldPassword, auth()->user()->password)) {
            Admin::where('id', auth()->id())->update([
                'password' => Hash::make($this->newPassword),
            ]);
            auth()->logout();
            return $this->redirect(request()->header('Referer'));
        } else {
            $this->reset(['oldPassword', 'newPassword']);
            session()->flash('message', 'danger|Invalid old password');
        }
    }
    public function render()
    {
        return view('livewire.changepassword');
    }
}
