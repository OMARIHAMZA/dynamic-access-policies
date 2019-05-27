<?php

namespace Tests\Unit;

use App\User;
use Illuminate\Validation\ValidationException;
use Symfony\Contracts\HttpClient\Test\HttpClientTestCase;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UsersTest extends TestCase
{
    private $user;
    private $newUser;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = User::find(1);
        $this->newUser = factory(User::class)->make();
        $this->actingAs($this->user);
    }

    /**
     * A unit test for create new user with valid data.
     *
     * @return void
     */
    public function testCreateNewValidUser()
    {
        $response = $this->json('post', '/users/', [
            'name' => $this->newUser['name'],
            'email' => $this->newUser['email'],
            'password' => $this->newUser['password'],
            'role_id' => $this->newUser['role_id']
        ]);
        $response->assertStatus(302);
    }

    /**
     *
     *
     * @return void
     */
    public function testCreateUserWithAlreadyExistedName()
    {
        $this->withoutExceptionHandling();
        $this->expectException(ValidationException::class);

        $this->newUser['name'] = $this->user['name'];

        $this->json('post', '/users/', [
            'name' => $this->newUser['name'],
            'email' => $this->newUser['email'],
            'password' => $this->newUser['password'],
            'role_id' => $this->newUser['role_id']
        ]);
    }

    /**
     *
     *
     * @return void
     */
    public function testCreateUserWithoutPassName()
    {
        $this->withoutExceptionHandling();
        $this->expectException(ValidationException::class);

        $this->json('post', '/users/', [
            'email' => $this->newUser['email'],
            'password' => $this->newUser['password'],
            'role_id' => $this->newUser['role_id']
        ]);
    }

    /**
     *
     *
     * @return void
     */
    public function testCreateUserWithoutPassEmail()
    {
        $this->withoutExceptionHandling();
        $this->expectException(ValidationException::class);

        $this->json('post', '/users/', [
            'name' => $this->newUser['name'],
            'password' => $this->newUser['password'],
            'role_id' => $this->newUser['role_id']
        ]);
    }

    /**
     *
     *
     * @return void
     */
    public function testCreateUserWithAlreadyExistedEmail()
    {
        $this->withoutExceptionHandling();
        $this->expectException(ValidationException::class);

        $this->newUser['email'] = $this->user['email'];

        $this->json('post', '/users/', [
            'name' => $this->newUser['name'],
            'email' => $this->newUser['email'],
            'password' => $this->newUser['password'],
            'role_id' => $this->newUser['role_id']
        ]);
    }

    /**
     *
     *
     * @return void
     */
    public function testCreateUserWithInvalidEmailForm()
    {
        $this->withoutExceptionHandling();
        $this->expectException(ValidationException::class);

        $this->newUser['email'] = 'iamnotvalid.email.com';

        $this->json('post', '/users/', [
            'name' => $this->newUser['name'],
            'email' => $this->newUser['email'],
            'password' => $this->newUser['password'],
            'role_id' => $this->newUser['role_id']
        ]);
    }

    /**
     *
     *
     * @return void
     */
    public function testCreateUserWithoutPassingPassword()
    {
        $this->withoutExceptionHandling();
        $this->expectException(ValidationException::class);

        $this->json('post', '/users/', [
            'name' => $this->newUser['name'],
            'email' => $this->newUser['email'],
            'role_id' => $this->newUser['role_id']
        ]);
    }

    /**
     *
     *
     * @return void
     */
    public function testCreateUserWithPasswordLengthLessThanRequired()
    {
        $this->withoutExceptionHandling();
        $this->expectException(ValidationException::class);

        $this->newUser['password'] = '123456789';

        $this->json('post', '/users/', [
            'name' => $this->newUser['name'],
            'email' => $this->newUser['email'],
            'password' => $this->newUser['password'],
            'role_id' => $this->newUser['role_id']
        ]);
    }

}
