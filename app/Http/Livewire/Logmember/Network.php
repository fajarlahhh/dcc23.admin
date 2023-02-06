<?php

namespace App\Http\Livewire\Logmember;

use App\Models\UserView;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Network extends Component
{
    public $username;

    protected $queryString = ['username'];

    public function render()
    {
        $data = UserView::with('downline.downline.downline')->with('invalidLeft')->with('invalidRight')->select(
            '*',
            DB::raw('(select ifnull(sum(package_value * reinvest), 0) from user_view uv where uv.network is not null and left(uv.network, length(concat(user_view.network, user_view.id, "l")))=concat(user_view.network, user_view.id, "l") ) valid_left'),
            DB::raw('(select ifnull(sum(package_value * reinvest), 0) from user_view uv where uv.network is not null and left(uv.network, length(concat(user_view.network, user_view.id, "r")))=concat(user_view.network, user_view.id, "r") ) valid_right')
        );

        if ($this->username) {
            $data = $data->where('username', $this->username);
        }
        return view('livewire.logmember.network', [
            'data' => $data->first(),
        ]);
    }
}
