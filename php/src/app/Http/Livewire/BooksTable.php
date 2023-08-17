<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Traits\IsBookTable;
use App\Models\Book;
use Livewire\Component;
use Livewire\WithPagination;

class BooksTable extends Component
{
    use WithPagination, IsBookTable;
    public $message = '';
    public $error = '';
    protected $listeners = ['message' => 'setMessage', 'error' => 'setError'];

    public function render()
    {
        $this->books = Book::queriable($this->search, $this->order, $this->perPage);

        return view('livewire.books-table', ['books' => $this->books]);
    }


    public function toggleModalShow(Book $book)
    {
        $this->modalShow = !$this->modalShow;
        $this->book = $book;
    }

    public function setError($error)
    {
        $this->error = $error;
    }

    public function setMessage($message){
        $this->message = $message;
        $this->render();
    }

}
