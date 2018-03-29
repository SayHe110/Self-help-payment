<?php

namespace Tests\Feature;

use App\Models\Topic;
use App\Models\User;
use Tests\TestCase;
use Tests\Traits\ActingJWTUser;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TopicApiTest extends TestCase
{
    use ActingJWTUser;

    protected $user;

    public function setUp()
    {
        parent::setUp();

        $this->user = factory(User::class)->create();
    }

    public function testStoreTopic()
    {
        $data = ['category_id' => 1, 'body' => 'test body', 'title' => 'test title'];

        $response = $this->JWTActingAs($this->user)
            ->json('POST', '/api/topics', $data);

        $assertData = [
            'category_id' => 1,
            'user_id' => $this->user->id,
            'title' => 'test title',
            'body' => 'test body',
        ];

        $response->assertStatus(201)
            ->assertJsonFragment($assertData);
    }

    public function testUpdateTopic()
    {
        $topic = $this->makeTopic();
        $editData = [
            'category_id' => 2,
            'title' => 'edit title',
            'body' => 'edit body',
        ];

        $response = $this->JWTActingAs($this->user)
            ->json('PATCH', '/api/topics/' . $topic->id, $editData);

        $assertData = [
            'user_id' => $this->user->id,
            'category_id' => 2,
            'title' => 'edit title',
            'body' => 'edit body',
        ];

        $response->assertStatus(200)->assertJsonFragment($assertData);
    }

    protected function makeTopic()
    {
        return factory(Topic::class)->create([
            'user_id' => $this->user->id,
            'category_id' => 2,
        ]);
    }

    public function testShowTopic()
    {
        $topic = $this->makeTopic();
        $response = $this->json('GET', '/api/topics/' . $topic->id);

        $assertData = [
            'user_id' => $topic->user_id,
            'category_id' => $topic->category_id,
            'title' => $topic->title,
            'body' => $topic->body,
        ];

        $response->assertStatus(200)
            ->assertJsonFragment($assertData);
    }

    public function testIndexTopic()
    {
        $response = $this->json('GET', '/api/topics');

        $response->assertStatus(200)
            ->assertJsonStructure(['data', 'meta']);
    }

    public function testDeleteTopic()
    {
        $topic = $this->makeTopic();

        $response = $this->JWTActingAs($this->user)
            ->json('DELETE', '/api/topics/'.$topic->id);

        $response->assertStatus(204);

        $response = $this->json('GET', '/api/topics/'.$topic->id);
        $response->assertStatus(404);
    }
}