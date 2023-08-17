<?php

namespace Tests\Unit\Books;

use App\Http\Livewire\EditBookModal;
use App\Http\Livewire\Traits\HasAuthorDropDown;
use App\Http\Livewire\Traits\HasCategoryDropDown;
use PHPUnit\Framework\TestCase;

class EditBookModalTraits extends TestCase
{
    /** @test */
    public function edit_book_modal_uses_author_dropdown()
    {
        $usingTrait = in_array(
            HasAuthorDropDown::class,
            array_keys((new \ReflectionClass(EditBookModal::class))->getTraits())
        );
        $this->assertTrue($usingTrait);
    }

    /** @test */
    public function edit_book_modal_uses_categories_dropdown()
    {
        $usingTrait = in_array(
            HasCategoryDropDown::class,
            array_keys((new \ReflectionClass(EditBookModal::class))->getTraits())
        );
        $this->assertTrue($usingTrait);
    }
}
