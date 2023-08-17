<?php

namespace App\Http\Livewire;

use App\Enums\BookStatus;
use App\Models\Book;
use App\Models\User;
use Livewire\Component;

class LendBookModal extends Component
{
    public $show = false;
    public Book $book;
    public $user;
    public $users;
    public $searchUser;

    protected $listeners = ['toggleLendBook' => 'toggleModal'];

    protected $rules = [
        'user' => 'required|exists:users,id',
        'book' => 'required',
        'book.id' => 'required|exists:books,id',
    ];

    public function mount(){
        $this->book = new Book();
    }

    public function render()
    {
        $this->users = User::latest()->where('id','!=', auth()->user()->id)
            ->search($this->searchUser)->limit(5)->get();
        return view('livewire.lend-book-modal');
    }

    public function lendBook()
    {
        $this->validate();
        $this->book->status = BookStatus::Taken;
        $this->book->save();
        $this->book->loans()->create(['user_id' => $this->user]);
        $this->emit('message', __('Book lend successfully'));
        $this->show = false;
    }

    public function unassign()
    {
        $this->book->status = BookStatus::Available;
        $this->book->save();
        $this->emit('message', __('Book unassigned successfully'));
        $this->show = false;
    }

    public function toggleModal(Book $book)
    {
        $this->book = $book;
        if($this->book->status === BookStatus::Taken){
            $this->user = $book->loans()->latest()->first()->user;
            $this->searchUser = (string)$this->user;
        }else{
            $this->user = null;
            $this->searchUser = '';
        }

        $this->show = !$this->show;
    }

    public function setUser(User $user)
    {
        $this->user = $user->id;
        $this->searchUser = (string)$user;
    }

    public function clearUser()
    {
        $this->user = null;
        $this->searchUser = '';
    }


}
