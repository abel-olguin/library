<?php

namespace Tests\Unit\Books;

use App\Http\Livewire\ChildBooksTable;
use App\Http\Livewire\Traits\IsBookTable;
use Livewire\WithPagination;
use PHPUnit\Framework\TestCase;

class ChildBooksTableTraits extends TestCase
{
    /** @test */
    public function books_table_uses_pagination()
    {
        $usingTrait = in_array(
            WithPagination::class,
            array_keys((new \ReflectionClass(ChildBooksTable::class))->getTraits())
        );
        $this->assertTrue($usingTrait);
    }

    /** @test */
    public function books_table_uses_book_table_trait()
    {
        $usingTrait = in_array(
            IsBookTable::class,
            array_keys((new \ReflectionClass(ChildBooksTable::class))->getTraits())
        );
        $this->assertTrue($usingTrait);
    }
}
