<?php

namespace Tests\Feature\Books;

use App\Enums\BookStatus;
use App\Http\Livewire\EditBookModal;
use App\Http\Livewire\LendBookModal;
use App\Models\Book;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class LendBook extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function can_lend_a_book()
    {
        $this->withExceptionHandling();
        $this->actingAs(User::factory()->create());
        $book = Book::factory()->create(['status' => BookStatus::Available]);
        $user = User::factory()->create();
        Livewire::test(LendBookModal::class)
            ->set('user', $user->id)
            ->set('book', $book)
            ->call('lendBook');

        $this->assertTrue($book->status === BookStatus::Available);
        $this->assertTrue($book->fresh()->status === BookStatus::Taken);
        $this->assertTrue($book->loans()->latest()->first()->user->id === $user->id);
    }

    /** @test  */
    function user_is_required()
    {
        $this->actingAs(User::factory()->create());

        Livewire::test(LendBookModal::class)
            ->set('user', '')
            ->call('lendBook')
            ->assertHasErrors(['user' => 'required']);
    }

    /** @test  */
    function book_id_is_required()
    {
        $this->actingAs(User::factory()->create());

        Livewire::test(LendBookModal::class)
            ->set('book.id', null)
            ->call('lendBook')
            ->assertHasErrors(['book.id' => 'required']);
    }

    /** @test  */
    function book_id_must_exists()
    {
        $this->actingAs(User::factory()->create());

        Livewire::test(LendBookModal::class)
            ->set('book.id', 1)
            ->call('lendBook')
            ->assertHasErrors(['book.id' => 'exists']);
    }

}
