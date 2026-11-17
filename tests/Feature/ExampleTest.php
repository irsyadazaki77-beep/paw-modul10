<?php

namespace Tests\Feature;

use Tests\TestCase;

class ExampleTest extends TestCase
{
    public function test_pages_return_successful_responses(): void
    {
        $this->get('/')->assertStatus(200)->assertSee('Belajar Controller');
        $this->get('/home')->assertStatus(200)->assertSee('Well done! this is Home.');
        $this->get('/profile')->assertStatus(200)->assertSee('Zaki Irsyada Putra');
        $this->get('/employees')->assertStatus(200)->assertSee('irsyadazaki77@gmail.com');
        $this->get('/employees/create')->assertStatus(200)->assertSee('Create Employee');
    }

    public function test_create_employee_validation_and_repopulation(): void
    {
        $response = $this->from('/employees/create')->post('/employees', [
            'firstName' => 'Zaki',
            'lastName' => '',
            'email' => 'bukan-email',
            'age' => 'dua puluh',
        ]);

        $response->assertRedirect('/employees/create');
        $response->assertSessionHasErrors(['lastName', 'email', 'age']);
        $this->assertEquals('Zaki', session()->getOldInput('firstName'));
    }

    public function test_create_employee_valid_submission_returns_json(): void
    {
        $response = $this->post('/employees', [
            'firstName' => 'Zaki',
            'lastName' => 'Irsyada Putra',
            'email' => 'irsyadazaki77@gmail.com',
            'age' => '19',
        ]);

        $response->assertStatus(200)->assertJson([
            'firstName' => 'Zaki',
            'lastName' => 'Irsyada Putra',
            'email' => 'irsyadazaki77@gmail.com',
            'age' => '19',
        ]);
    }
}
