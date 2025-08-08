<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Consignor;
use App\Models\Admin;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ConsignorTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        
        // Create an admin user for testing
        $this->admin = Admin::factory()->create();
    }

    public function test_admin_can_view_consignors_index()
    {
        $response = $this->actingAs($this->admin, 'admin')
                         ->get(route('admin.consignors.index'));

        $response->assertStatus(200);
        $response->assertViewIs('admin.consignors.index');
    }

    public function test_admin_can_view_create_consignor_form()
    {
        $response = $this->actingAs($this->admin, 'admin')
                         ->get(route('admin.consignors.create'));

        $response->assertStatus(200);
        $response->assertViewIs('admin.consignors.create');
    }

    public function test_admin_can_create_consignor()
    {
        $consignorData = [
            'name' => 'Test Consignor',
            'address' => '123 Test Street, Test City',
            'gst_no' => '27TEST1234567890',
            'contact_person' => 'John Doe',
            'phone' => '+91 9876543210',
            'email' => 'test@consignor.com',
            'is_active' => 1,
        ];

        $response = $this->actingAs($this->admin, 'admin')
                         ->post(route('admin.consignors.store'), $consignorData);

        $response->assertRedirect(route('admin.consignors.index'));
        $response->assertSessionHas('success');

        $this->assertDatabaseHas('consignors', [
            'name' => 'Test Consignor',
            'email' => 'test@consignor.com',
        ]);
    }

    public function test_admin_can_view_consignor_details()
    {
        $consignor = Consignor::factory()->create();

        $response = $this->actingAs($this->admin, 'admin')
                         ->get(route('admin.consignors.show', $consignor));

        $response->assertStatus(200);
        $response->assertViewIs('admin.consignors.show');
        $response->assertViewHas('consignor', $consignor);
    }

    public function test_admin_can_view_edit_consignor_form()
    {
        $consignor = Consignor::factory()->create();

        $response = $this->actingAs($this->admin, 'admin')
                         ->get(route('admin.consignors.edit', $consignor));

        $response->assertStatus(200);
        $response->assertViewIs('admin.consignors.edit');
        $response->assertViewHas('consignor', $consignor);
    }

    public function test_admin_can_update_consignor()
    {
        $consignor = Consignor::factory()->create();
        
        $updateData = [
            'name' => 'Updated Consignor',
            'address' => '456 Updated Street, Updated City',
            'gst_no' => '27UPDATED123456',
            'contact_person' => 'Jane Doe',
            'phone' => '+91 9876543211',
            'email' => 'updated@consignor.com',
            'is_active' => 0,
        ];

        $response = $this->actingAs($this->admin, 'admin')
                         ->put(route('admin.consignors.update', $consignor), $updateData);

        $response->assertRedirect(route('admin.consignors.index'));
        $response->assertSessionHas('success');

        $this->assertDatabaseHas('consignors', [
            'id' => $consignor->id,
            'name' => 'Updated Consignor',
            'email' => 'updated@consignor.com',
        ]);
    }

    public function test_admin_can_delete_consignor()
    {
        $consignor = Consignor::factory()->create();

        $response = $this->actingAs($this->admin, 'admin')
                         ->delete(route('admin.consignors.destroy', $consignor));

        $response->assertRedirect(route('admin.consignors.index'));
        $response->assertSessionHas('success');

        $this->assertDatabaseMissing('consignors', [
            'id' => $consignor->id,
        ]);
    }

    public function test_consignor_validation_requires_name_and_address()
    {
        $response = $this->actingAs($this->admin, 'admin')
                         ->post(route('admin.consignors.store'), []);

        $response->assertSessionHasErrors(['name', 'address']);
    }
} 