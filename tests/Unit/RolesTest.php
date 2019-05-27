<?php

namespace Tests\Unit;

use App\Role;
use App\User;
use Illuminate\Validation\ValidationException;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RolesTest extends TestCase
{
    private $user;
    private $role;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = User::find(1);
        $this->actingAs($this->user);

        $this->role = factory(Role::class)->make();
    }

    /**
     * A unit test for create new role with valid data.
     *
     * @return void
     */
    public function testCreateNewValidRole()
    {
        $response = $this->json('post', '/roles/', [
            'title' => $this->role['title'],
            'description' => $this->role['description']
        ]);
        $response->assertStatus(302);
    }

    /**
     *
     *
     * @return void
     */
    public function testCreateRoleWithExistedRoleTitle()
    {
        $this->withoutExceptionHandling();
        $this->expectException(ValidationException::class);

        $this->role['title'] = $this->user->roleTitle();

        $this->json('post', '/roles/', [
            'title' => $this->role['title'],
            'description' => $this->role['description']
        ]);
    }

    /**
     *
     *
     * @return void
     */
    public function testCreateRoleWithoutPassingRoleTitle()
    {
        $this->withoutExceptionHandling();
        $this->expectException(ValidationException::class);

        $this->json('post', '/roles/', [
            'description' => $this->role['description']
        ]);
    }
}
