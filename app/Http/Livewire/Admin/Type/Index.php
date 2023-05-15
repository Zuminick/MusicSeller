<?php

namespace App\Http\Livewire\Admin\Type;

use App\Models\Type;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $type_id;
    
    public function deletetype($type)
    {
        $this->type_id = $type;
    }

    public function destroytype()
    {
        $type = type::find($this->type_id);
        $type->delete();
        session()->flash('message', 'type deleted');
        $this->dispatchBrowserEvent('close-modal');
    }

    public function render()
    {
        $types = type::orderBy('id','DESC')->paginate(10);
        return view('livewire.admin.type.index',['types' => $types]);
    }
}
