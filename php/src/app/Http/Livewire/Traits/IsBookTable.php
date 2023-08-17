<?php

namespace App\Http\Livewire\Traits;

trait IsBookTable
{
    public $search;
    public $order = '-id';
    public $perPage = 10;
    public $modalShow = false;
    private $books;
    public $book;

    public function getQueryString(): array
    {
        return ['search' => ['except' => ''], 'order' => ['except' => '-id'],'perPage' => ['except' => 10]];
    }

    public function setOrder($field)
    {
        if($field === $this->order){
            if(!str($this->order)->startsWith('-')){
                $field = "-{$field}";
            }
        }
        $this->order = $field;
    }
}
