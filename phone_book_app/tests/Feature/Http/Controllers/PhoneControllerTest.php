<?php

namespace Tests\Feature\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class PhoneControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_the_phones_index_page_is_rendered_properly()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->get('/phones');

        $response->assertStatus(200);
    }
}
