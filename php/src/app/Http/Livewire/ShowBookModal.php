<?php

namespace App\Http\Livewire;

use App\Models\Book;
use Livewire\Component;

class ShowBookModal extends Component
{
    public $book;
    public $show = false;
    protected $listeners = ['toggleShowBook' => 'toggleShow'];


    public function render()
    {
        return view('livewire.show-book-modal');
    }

    public function toggleShow(Book $book)
    {
        $this->book = $book;
        $this->show = !$this->show;
    }

}
