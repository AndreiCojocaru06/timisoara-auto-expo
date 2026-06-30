<?php

namespace Tests\Feature;

use App\Models\Contact;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ContactTest extends TestCase
{
    use RefreshDatabase;

    public function test_contact_page_loads(): void
    {
        $response = $this->get('/contact');
        $response->assertStatus(200);
    }

    public function test_contact_form_saves_to_database(): void
    {
        $response = $this->post('/contact', [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'message' => 'Acesta este un mesaj de test mai lung.',
        ]);

        $response->assertRedirect();
        $this->assertDatabaseHas('contacts', [
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }

    public function test_contact_form_requires_name(): void
    {
        $response = $this->post('/contact', [
            'email' => 'test@example.com',
            'message' => 'Mesaj de test fara nume.',
        ]);

        $response->assertSessionHasErrors('name');
    }

    public function test_contact_form_requires_valid_email(): void
    {
        $response = $this->post('/contact', [
            'name' => 'Test User',
            'email' => 'not-an-email',
            'message' => 'Mesaj de test cu email invalid.',
        ]);

        $response->assertSessionHasErrors('email');
    }
}