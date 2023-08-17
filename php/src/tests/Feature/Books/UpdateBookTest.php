<?php

namespace Books;

use App\Http\Livewire\EditBookModal;
use App\Http\Livewire\NewBookModal;
use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class UpdateBookTest extends TestCase
{
    use RefreshDatabase;
    /** @test  */
    function can_edit_book()
    {
        $this->withExceptionHandling();
        $this->actingAs(User::factory()->create());
        $book = Book::factory()->create();
        $name = 'My new book\'s name';
        $pub_date = '2012-10-10';
        $oldCategory = Category::factory()->create();
        $oldCAuthor = Category::factory()->create();
        $oldCategory->books()->sync([$book->id]);
        $oldCAuthor->books()->attach([$book->id]);

        $category = Category::factory()->create();
        $author = Author::factory()->create();

        Livewire::test(EditBookModal::class)
            ->set('book', $book)
            ->set('book.name', $name)
            ->set('book.publication_date', $pub_date)
            ->set('category', $category->id)
            ->set('author', $author->id)
            ->call('saveBook');

        $this->assertTrue($book->name !== $name);
        $this->assertTrue($book->publication_date !== $pub_date);
        $this->assertTrue($book->category->id !== $oldCategory->id);
        $this->assertTrue($book->author->id !== $oldCAuthor->id);

        $this->assertTrue($book->fresh()->name === $name);
        $this->assertTrue($book->fresh()->publication_date === $pub_date);
        $this->assertTrue($book->categories()->count() === 1);
        $this->assertTrue($book->authors()->count() === 1);

    }

    /** @test  */
    function name_is_required()
    {
        $this->actingAs(User::factory()->create());

        Livewire::test(EditBookModal::class)
            ->set('book.name', '')
            ->call('saveBook')
            ->assertHasErrors(['book.name' => 'required']);
    }

    /** @test  */
    function publication_date_is_required()
    {
        $this->actingAs(User::factory()->create());

        Livewire::test(EditBookModal::class)
            ->set('book.publication_date', '')
            ->call('saveBook')
            ->assertHasErrors(['book.publication_date' => 'required']);
    }

    /** @test  */
    function category_is_required()
    {
        $this->actingAs(User::factory()->create());

        Livewire::test(EditBookModal::class)
            ->set('category', '')
            ->call('saveBook')
            ->assertHasErrors(['category' => 'required']);
    }

    /** @test  */
    function author_is_required()
    {
        $this->actingAs(User::factory()->create());

        Livewire::test(EditBookModal::class)
            ->set('author', '')
            ->call('saveBook')
            ->assertHasErrors(['author' => 'required']);
    }

    /** @test  */
    function book_id_must_exists()
    {
        $this->actingAs(User::factory()->create());

        Livewire::test(EditBookModal::class)
            ->set('book.id', 1)
            ->call('saveBook')
            ->assertHasErrors(['book.id' => 'exists']);
    }
}
