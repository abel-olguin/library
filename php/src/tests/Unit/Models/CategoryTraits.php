<?php

namespace Tests\Unit\Models;

use App\Models\Category;
use App\Models\Traits\IsQueriable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use PHPUnit\Framework\TestCase;

class CategoryTraits extends TestCase
{
    /** @test */
    public function category_uses_is_queriable_trait()
    {
        $usingTrait = in_array(
            IsQueriable::class,
            array_keys((new \ReflectionClass(Category::class))->getTraits())
        );
        $this->assertTrue($usingTrait);
    }

    /** @test */
    public function category_uses_factory_trait()
    {
        $usingTrait = in_array(
            HasFactory::class,
            array_keys((new \ReflectionClass(Category::class))->getTraits())
        );
        $this->assertTrue($usingTrait);
    }
}
