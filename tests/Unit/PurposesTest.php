<?php

namespace Tests\Unit;

use App\Purpose;
use App\User;
use Illuminate\Database\QueryException;
use Illuminate\Validation\ValidationException;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PurposesTest extends TestCase
{
    private $user;
    private $purpose;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = User::find(1);
        $this->actingAs($this->user);

        $this->purpose = factory(Purpose::class)->make();
    }

    /**
     *
     *
     * @return void
     */
    public function testCreateValidPurpose()
    {
        $response = $this->json('post', '/purposes', [
            'name' => $this->purpose['name'],
            'purpose' => $this->purpose['purpose'],
            'action' => $this->purpose['action'],
            'creator_id' => $this->user['id']
        ]);
        $response->assertStatus(302);
    }

    /**
     *
     *
     * @return void
     */
    public function testCreatePurposeWithExistedPurposeName()
    {
        $this->withoutExceptionHandling();
        $this->expectException(ValidationException::class);

        $this->purpose['name'] = Purpose::first()->name;

        $this->json('post', '/purposes/', [
            'name' => $this->purpose['name'],
            'purpose' => $this->purpose['purpose'],
            'action' => $this->purpose['action'],
            'creator_id' => $this->user['id']
        ]);
    }

    /**
     *
     *
     * @return void
     */
    public function testCreatePurposeWithoutPassedPurposeName()
    {
        $this->withoutExceptionHandling();
        $this->expectException(ValidationException::class);

        $this->json('post', '/purposes/', [
            'purpose' => $this->purpose['purpose'],
            'action' => $this->purpose['action'],
            'creator_id' => $this->user['id']
        ]);
    }

    /**
     *
     *
     * @return void
     */
    public function testCreatePurposeWithoutPassedPurposeDescription()
    {
        $this->withoutExceptionHandling();
        $this->expectException(ValidationException::class);

        $this->json('post', '/purposes/', [
            'name' => $this->purpose['name'],
            'action' => $this->purpose['action'],
            'creator_id' => $this->user['id']
        ]);
    }

    /**
     *
     *
     * @return void
     */
    public function testCreatePurposeWithoutPassedPurposeAction()
    {
        $this->withoutExceptionHandling();
        $this->expectException(ValidationException::class);

        $this->json('post', '/purposes/', [
            'name' => $this->purpose['name'],
            'purpose' => $this->purpose['purpose'],
            'creator_id' => $this->user['id']
        ]);
    }

    /**
     *
     *
     * @return void
     */
    public function testCreatePurposeWithPurposeActionNotAsExpected()
    {
        $this->withoutExceptionHandling();
        $this->expectException(QueryException::class);

        // The expected actions list is [create, update, delete, read] which is
        // defined as constraint on the table in the database
        $this->purpose['action'] = 'invalid';

        $this->json('post', '/purposes/', [
            'name' => $this->purpose['name'],
            'purpose' => $this->purpose['purpose'],
            'action' => $this->purpose['action'],
            'creator_id' => $this->user['id']
        ]);
    }

    /**
     *
     *
     * @return void
     */
    public function testCreatePurposeWithoutPassingCreatorId()
    {
        $this->withoutExceptionHandling();
        $this->expectException(ValidationException::class);

        $this->json('post', '/purposes/', [
            'name' => $this->purpose['name'],
            'purpose' => $this->purpose['purpose'],
            'action' => $this->purpose['action'],
        ]);
    }
}
