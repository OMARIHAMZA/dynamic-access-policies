<?php

namespace Tests\Unit;

use App\Policy;
use App\User;
use Illuminate\Validation\ValidationException;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PoliciesTest extends TestCase
{
    private $user;
    private $policy;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = User::find(1);
        $this->actingAs($this->user);

        $this->policy = factory(Policy::class)->make();
    }

    /**
     *
     *
     * @return void
     */
    public function testCreateValidPolicy()
    {
        $response = $this->json('post', '/policies/', [
            'name' => $this->policy['name'],
            'description' => $this->policy['description'],
            'creator_id' => $this->user['id']
        ]);
        $response->assertStatus(302);
    }

    /**
     *
     *
     * @return void
     */
    public function testCreatePolicyWithExistedName()
    {
        $this->withoutExceptionHandling();
        $this->expectException(ValidationException::class);

        $this->policy['name'] = Policy::first()->name;

        $this->json('post', '/purposes/', [
            'name' => $this->policy['name'],
            'description' => $this->policy['description'],
            'creator_id' => $this->user['id']
        ]);
    }

    /**
     *
     *
     * @return void
     */
    public function testCreatePolicyWithoutPassedName()
    {
        $this->withoutExceptionHandling();
        $this->expectException(ValidationException::class);

        $this->json('post', '/purposes/', [
            'description' => $this->policy['description'],
            'creator_id' => $this->user['id']
        ]);
    }

    /**
     *
     *
     * @return void
     */
    public function testCreatePolicyWithoutPassedDescription()
    {
        $this->withoutExceptionHandling();
        $this->expectException(ValidationException::class);

        $this->json('post', '/purposes/', [
            'name' => $this->policy['name'],
            'creator_id' => $this->user['id']
        ]);
    }

    /**
     *
     *
     * @return void
     */
    public function testCreatePolicyWithoutCreatorID()
    {
        $this->withoutExceptionHandling();
        $this->expectException(ValidationException::class);

        $this->json('post', '/purposes/', [
            'name' => $this->policy['name'],
            'description' => $this->policy['description']
        ]);
    }
}
