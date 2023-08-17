<?php

namespace Tests\Unit\Models;

use App\Models\Traits\IsQueriable;
use App\Models\User;
use PHPUnit\Framework\TestCase;

class UserTraits extends TestCase
{
    /** @test */
    public function author_uses_is_queriable_trait()
    {
        $usingTrait = in_array(
            IsQueriable::class,
            array_keys((new \ReflectionClass(User::class))->getTraits())
        );
        $this->assertTrue($usingTrait);
    }
}
