<?php

namespace App\Http\Livewire\Admin\Genre;

use App\Models\Genre;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $genre_id;
    
    public function deleteGenre($genre)
    {
        $this->genre_id = $genre;
    }

    public function destroyGenre()
    {
        $genre = Genre::find($this->genre_id);
        $genre->delete();
        session()->flash('message', 'Genre deleted');
        $this->dispatchBrowserEvent('close-modal');
    }

    public function render()
    {
        $genres = Genre::orderBy('id','DESC')->paginate(10);
        return view('livewire.admin.genre.index',['genres' => $genres]);
    }
}
