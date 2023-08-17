<?php

namespace App\Http\Livewire\Traits;

use App\Models\Author;

trait HasAuthorDropDown
{
    public $searchAuthor = '';
    public $author;

    public function getAuthorsProperty()
    {
        return Author::latest()->search($this->searchAuthor)->limit(5)->get();
    }

    public function setAuthor(Author $author)
    {
        $this->author = $author->id;
        $this->searchAuthor = (string)$author;
    }

    public function clearAuthor()
    {
        $this->author = null;
        $this->searchAuthor = '';
    }

}
