<?php

namespace App\Http\Livewire\Traits;

use App\Models\Author;
use App\Models\Category;

trait HasCategoryDropDown
{
    public $category;
    public $searchCategory = '';

    public function getCategoriesProperty()
    {
        return Category::latest()->search($this->searchCategory)->limit(5)->get();
    }

    public function setCategory(Category $category)
    {
        $this->category = $category->id;
        $this->searchCategory = (string)$category;
    }

    public function clearCategory()
    {
        $this->category = null;
        $this->searchCategory = '';
    }

}
