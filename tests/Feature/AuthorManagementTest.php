<?php

namespace Tests\Feature;

use App\Author;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthorManagementTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function an_author_can_be_created(){

        $this->withoutExceptionHandling();

        $this->post('/author',[
            'name' => 'Author Name',
            'dob' => '06/21/1987'
        ]);

        $author = Author::all();

        $this->assertCount(1, $author);
        $this->assertInstanceOf(Carbon::class, $author->first()->dob);
        $this->assertEquals('1987-06-21', $author->first()->dob->format('Y-m-d'));

    }
}
