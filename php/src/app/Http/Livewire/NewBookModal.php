<?php

namespace App\Http\Livewire;

use App\Enums\BookStatus;
use App\Http\Livewire\Traits\HasAuthorDropDown;
use App\Http\Livewire\Traits\HasCategoryDropDown;
use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use Livewire\Component;

class NewBookModal extends Component
{
    use HasAuthorDropDown, HasCategoryDropDown;
    public $show = false;
    public Book $book;

    protected $listeners = ['toggleNewBook' => 'toggleModal'];

    protected $rules = [
        'category' => 'required|exists:categories,id',
        'author' => 'required|exists:authors,id',
        'book.name' => 'required|min:6',
        'book.publication_date' => 'required|date',
    ];

    public function mount(){
        $this->book = new Book();
    }

    public function render()
    {
        return view('livewire.new-book-modal');
    }

    public function toggleModal()
    {
        $this->book = new Book();
        $this->show = !$this->show;
    }

    public function saveBook()
    {
        $this->validate();
        try {
            $this->book->slug = str($this->book->name)->slug().uniqid();
            $this->book->status = BookStatus::Available;
            $this->book->image = 'https://via.placeholder.com/200x200';
            $this->book->save();

            $this->book->categories()->attach((int)$this->category);
            $this->book->authors()->attach($this->author);
            $this->emit('message', __('Book successfully created.'));
        }catch (\Exception $e){
            $this->emit('error', __('An error has occurred: '.$e->getMessage()));
        }

        $this->show = false;
    }
}
