<?php

namespace App\Http\Livewire\Datamember;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Datakasbon extends Component
{
    use WithPagination;
    public $search, $delete, $insert;
    protected $paginationTheme = 'bootstrap';
    protected $queryString = ['search'];

    public function setDelete($delete = null)
    {
        $this->delete = $delete;
    }

    public function delete()
    {
        User::where('id', $this->delete)->update([
            'kas_bon' => null,
        ]);
        $this->delete = null;
    }

    public function submit()
    {
        User::where('id', $this->insert)->update([
            'kas_bon' => 1,
        ]);
        $this->insert = null;
    }

    public function render()
    {
        return view('livewire.datamember.datakasbon', [
            'no' => ($this->page - 1) * 10,
            'data' => User::where('kas_bon', 1)->with('package')->where('username', 'like', '%' . $this->search . '%')->paginate(10),
        ]);
    }
}
