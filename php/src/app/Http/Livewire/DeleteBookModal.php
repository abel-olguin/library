<?php

namespace App\Http\Livewire;

use App\Models\Book;
use Livewire\Component;

class DeleteBookModal extends Component
{
    public $show = false;
    public Book $book;
    protected $listeners = ['toggleDeleteBook' => 'toggleModal'];
    protected $rules = [
        'book' => 'required',
        'book.id' => 'required|exists:books,id',
    ];

    public function mount(){
        $this->book = new Book();
    }

    public function render()
    {
        return view('livewire.delete-book-modal');
    }

    public function toggleModal(Book $book)
    {
        $this->book = $book;
        $this->show = !$this->show;
    }

    public function deleteBook()
    {
        $this->validate();
        $this->book->delete();
        $this->emit('message', __('Book deleted successfully.'));
        $this->show = false;

    }
}
