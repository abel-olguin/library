<?php

namespace Tests\Unit\Books;

use App\Http\Livewire\NewBookModal;
use App\Http\Livewire\Traits\HasAuthorDropDown;
use App\Http\Livewire\Traits\HasCategoryDropDown;
use PHPUnit\Framework\TestCase;

class NewBookModalTraits extends TestCase
{
    /** @test */
    public function new_book_modal_uses_author_dropdown()
    {
        $usingTrait = in_array(
            HasAuthorDropDown::class,
            array_keys((new \ReflectionClass(NewBookModal::class))->getTraits())
        );
        $this->assertTrue($usingTrait);
    }

    /** @test */
    public function new_book_modal_uses_categories_dropdown()
    {
        $usingTrait = in_array(
            HasCategoryDropDown::class,
            array_keys((new \ReflectionClass(NewBookModal::class))->getTraits())
        );
        $this->assertTrue($usingTrait);
    }
}
