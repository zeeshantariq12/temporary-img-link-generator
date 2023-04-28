<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class UserFeatureTest extends TestCase
{
    private $user;

    public function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create([
            'name' => 'test user',
            'type' => 1,
            'file' => '4dfdcbf3-5a1c-497a-abe7-46ec8f0c2d85.jpg',
            'description' => 'hello world'
        ]);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_fetch_all_users()
    {
        $response = $this->getJson(route('users.index'))->json('users');
        $this->assertEquals('wasim', $response[0]['name']);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_create_user()
    {
        $this->withExceptionHandling();
        $user = User::factory()->make();
        $response = $this->postJson(route('users.store'), ['name' => $user->name, 'type' => $user->type, 'description' => $user->description, 'file' => UploadedFile::fake()->image('avatar.jpg')])->assertCreated()->json('user');
        $this->assertEquals($user->name, $response['name']);
        $this->assertDatabaseHas('users', ['name' => $user->name]);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_get_single_user()
    {
        $response = $this->getJson(route('users.show', $this->user->id))->assertOk()->json('user');
        $this->assertEquals($response['name'], $this->user->name);
    }

    public function test_get_image_url()
    {
        $singleUser = $this->getJson(route('users.show', $this->user->id))->assertOk()->json('user');
        $response = $this->get($singleUser['file'])->assertOk();
        $this->assertEquals($response->getStatusCode(), 200);
    }


}
