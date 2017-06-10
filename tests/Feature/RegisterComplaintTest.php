<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Models\Citizen;
use App\Models\Complaint;

class RegisterComplaintTest extends TestCase
{

    use DatabaseMigrations;

    public function setUp()
    {
        parent::setUp();
        $this->seed('CommunicationTypesSeeder');
        $this->seed('ComplaintStatesSeeder');
        $this->seed('ContaminationTypesSeeder');
    }

    public function testRegisterComplaint()
    {
        $complaint = factory(Complaint::class)->make();
        $citizen = factory(Citizen::class)->create();

        $this->actingAs($citizen)
             ->post(route('complaint.store'), [
                '_token' => csrf_token(),
                'citizen_id'            => $citizen->id,
                'authority_id'          => $complaint->authority_id,
                'type_contamination_id' => $complaint->type_contamination_id,
                'type_communication_id' => $complaint->type_communication_id,
                'complaint_state_id'    => $complaint->complaint_state_id,
                'latitude'              => $complaint->latitude,
                'longitude'             => $complaint->longitude,
                'commentary'            => $complaint->commentary
        ])
        ->assertRedirect(route('complaint.index'));
    }
}
