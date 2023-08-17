<?php

namespace Tests\Feature\Books;

use App\Http\Livewire\DeleteBookModal;
use App\Models\Book;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class DeleteBook extends TestCase
{
    use RefreshDatabase;

    /** @test  */
    function can_delete_a_book()
    {
        $this->actingAs(User::factory()->create());
        $book = Book::factory()->create();

        Livewire::test(DeleteBookModal::class)
            ->set('book', $book)
            ->call('deleteBook');

        $this->assertSoftDeleted(Book::class,['id' => $book->id]);
    }

    /** @test  */
    function book_id_must_exists()
    {
        $this->actingAs(User::factory()->create());

        Livewire::test(DeleteBookModal::class)
            ->set('book.id', 111)
            ->call('deleteBook')
            ->assertHasErrors(['book.id' => 'exists']);
    }
}
