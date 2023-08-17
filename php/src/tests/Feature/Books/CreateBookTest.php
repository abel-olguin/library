<?php

namespace Books;

use App\Http\Livewire\NewBookModal;
use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class CreateBookTest extends TestCase
{
    use RefreshDatabase;
    /** @test  */
    function can_create_book()
    {
        $this->withExceptionHandling();
        $this->actingAs(User::factory()->create());
        $name = 'My new book';
        $category = Category::factory()->create();
        $author = Author::factory()->create();

        Livewire::test(NewBookModal::class)
            ->set('book.name', $name)
            ->set('book.publication_date', '2012-10-10')
            ->set('category', $category->id)
            ->set('author', $author->id)
            ->call('saveBook');

        $this->assertTrue(Book::whereName($name)->exists());
        $book = Book::whereName($name)->first();
        $this->assertTrue($book->category->id === $category->id);
        $this->assertTrue($book->author->id === $author->id);
    }

    /** @test  */
    function name_is_required()
    {
        $this->actingAs(User::factory()->create());

        Livewire::test(NewBookModal::class)
            ->set('book.name', '')
            ->call('saveBook')
            ->assertHasErrors(['book.name' => 'required']);
    }

    /** @test  */
    function publication_date_is_required()
    {
        $this->actingAs(User::factory()->create());

        Livewire::test(NewBookModal::class)
            ->set('book.publication_date', '')
            ->call('saveBook')
            ->assertHasErrors(['book.publication_date' => 'required']);
    }

    /** @test  */
    function category_is_required()
    {
        $this->actingAs(User::factory()->create());

        Livewire::test(NewBookModal::class)
            ->set('category', '')
            ->call('saveBook')
            ->assertHasErrors(['category' => 'required']);
    }

    /** @test  */
    function author_is_required()
    {
        $this->actingAs(User::factory()->create());

        Livewire::test(NewBookModal::class)
            ->set('author', '')
            ->call('saveBook')
            ->assertHasErrors(['author' => 'required']);
    }
}
