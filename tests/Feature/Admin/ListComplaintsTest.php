<?php

namespace Tests\Feature\Admin;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Models\User;
use App\Models\Complaint;
use App\Models\Authority;

class ListComplaintsTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * For all the tests seed the communication types, complaint states
     * and contamination types
     */
    public function setUp()
    {
        parent::setUp();
        $this->seed('CommunicationTypesSeeder');
        $this->seed('ComplaintStatesSeeder');
        $this->seed('ContaminationTypesSeeder');
    }

    /**
     * Test for verify that a admin can see all the complaints
     *
     * @return void
     */
    public function test_admin_can_see_all_complaints()
    {
        $authority = factory(Authority::class)->create();

        // Create an admin and authenticate as admin
        $this->be(factory(User::class)->states('admin')->create(), 'admin');

        // Create 10 complaints
        factory(Complaint::class, 10)->states('messenger')->create([
            'authority_id' => $authority->id
        ]);

        // Enter to list of complaints
        $response = $this->get(route('admin.complaint.index'))
             ->assertStatus(200);

        // Count the complaints
        $this->assertTrue(substr_count($response->getContent(), '<tr>') == 10);
    }

    /**
     * Test for verify that a authority can see the complaints completed
     * of the district assigned
     *
     * @return void
     */
    public function test_authority_can_see_complaints_of_its_district_assigned()
    {
        $comas_authority = factory(Authority::class)->create();
        $miraflores_authority = factory(Authority::class)->create();

        $this->be($comas_authority->user, 'admin');

        // Create 8 complaints for Comas
        factory(Complaint::class, 8)->states('messenger', 'completed')->create([
            'authority_id' => $comas_authority->id
        ]);

        // Create 2 complaints for Miraflores
        factory(Complaint::class, 2)->states('messenger', 'completed')->create([
            'authority_id' => $miraflores_authority->id
        ]);

        // Enter to list of complaints
        $response = $this->get(route('admin.complaint.index'))
             ->assertStatus(200);

        // Assert only can see the complaints assigned by district
        $this->assertTrue(substr_count($response->getContent(), '<tr>') == 8);
        // Assert can not see the complaints assigned by district
        $this->assertFalse(substr_count($response->getContent(), '<tr>') == 10);
    }
}
