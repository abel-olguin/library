<?php

namespace Tests\Unit\Models;

use App\Models\Book;
use App\Models\Traits\IsQueriable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use PHPUnit\Framework\TestCase;

class BookTraits extends TestCase
{
    /** @test */
    public function book_uses_factory_trait()
    {
        $usingTrait = in_array(
            HasFactory::class,
            array_keys((new \ReflectionClass(Book::class))->getTraits())
        );
        $this->assertTrue($usingTrait);
    }

    /** @test */
    public function book_uses_soft_deletes_trait()
    {
        $usingTrait = in_array(
            SoftDeletes::class,
            array_keys((new \ReflectionClass(Book::class))->getTraits())
        );
        $this->assertTrue($usingTrait);
    }

    /** @test */
    public function book_uses_is_queriable_trait()
    {
        $usingTrait = in_array(
            IsQueriable::class,
            array_keys((new \ReflectionClass(Book::class))->getTraits())
        );
        $this->assertTrue($usingTrait);
    }
}


