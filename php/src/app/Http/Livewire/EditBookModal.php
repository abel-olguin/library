<?php

namespace App\Http\Livewire;

use App\Enums\BookStatus;
use App\Http\Livewire\Traits\HasAuthorDropDown;
use App\Http\Livewire\Traits\HasCategoryDropDown;
use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use Livewire\Component;

class EditBookModal extends Component
{
    use HasAuthorDropDown, HasCategoryDropDown;

    public $show = false;
    public Book $book;

    protected $listeners = ['toggleEditBook' => 'toggleModal'];

    protected $rules = [
        'category' => 'required|exists:categories,id',
        'author' => 'required|exists:authors,id',
        'book' => 'required',
        'book.id' => 'required|exists:books,id',
        'book.name' => 'required|min:6',
        'book.publication_date' => 'required|date',
    ];

    public function mount(){
        $this->book = new Book();
    }

    public function render()
    {
        return view('livewire.edit-book-modal');
    }

    public function toggleModal(Book $book)
    {
        $this->book = $book;
        $this->author = $book->author->id;
        $this->searchAuthor = (string)$book->author;
        $this->category = $book->category->id;
        $this->searchCategory = (string)$book->category;
        $this->show = !$this->show;
    }

    public function saveBook()
    {
        $this->validate();
        try {
            if($this->book->wasChanged(['name'])){
                $this->book->slug = str($this->book->name)->slug().uniqid();
            }

            $this->book->image = 'https://via.placeholder.com/200x200';
            $this->book->save();

            $this->book->categories()->sync([(int)$this->category]);
            $this->book->authors()->sync([(int)$this->author]);

            $this->emit('message', __('Book successfully updated.'));

        }catch (\Exception $e){
            dd($e);

            $this->emit('error', __('An error has occurred: '.$e->getMessage()));
        }


        $this->show = false;
    }
}
