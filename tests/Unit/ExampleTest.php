<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Support\Facades\DB as DB;
use App\User;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function setUp(): void{
        parent::setUp();
        DB::beginTransaction();
    }
    public function tearDown(): void{
        DB::rollBack();
    }
    public function testBasicTest()
    {
        $this->assertTrue(true);
    }
    public function testUserRegister(){
        $response = $this->json('POST', '/register', ['username' => '', 'password' => 'feeffefe']);
        $response->assertStatus(422)->assertJson(['message' => 'The given data was invalid.'])->assertJson(['errors' => ['username' => ['The username field is required.']]]);
    }
    public function test2()
    {
        $response = $this->json('POST','/register',['username' => 'phptest', 'password' => '111111']);
        $response2 = $this->json('POST','/login',['username' => 'phptest', 'password' => '111111']);
        $user = factory(User::class)->make();
        $response3 = $this->actingAs($user)->get('/tag/get');
        $response3->dump();
    }
    public function testRe(){
        $response = $this->get('/');
        $response->assertRedirect('/index');
        $response2 = $this->get('/index');
        $response2->assertRedirect('/index/now');
    }
}
