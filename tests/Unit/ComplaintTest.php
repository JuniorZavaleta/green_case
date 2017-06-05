<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Models\Complaint;
use App\Models\Authority;

class ComplaintTest extends TestCase
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
     * Test for verify completed scope function get all the not incompletes complaints
     */
    public function test_scope_completed_and_incompleted()
    {
        $authority = factory(Authority::class)->create();
        // Create 2 incompleted
        factory(Complaint::class, 2)->create(['authority_id' => $authority->id, 'complaint_state_id' => Complaint::INCOMPLETED]);
        // Create 2 completed
        factory(Complaint::class, 2)->create(['authority_id' => $authority->id, 'complaint_state_id' => Complaint::COMPLETED]);
        // Create 2 accepted
        factory(Complaint::class, 2)->create(['authority_id' => $authority->id, 'complaint_state_id' => Complaint::ACCEPTED]);
        // Create 2 rejected
        factory(Complaint::class, 2)->create(['authority_id' => $authority->id, 'complaint_state_id' => Complaint::REJECTED]);
        // Create 2 on attention
        factory(Complaint::class, 2)->create(['authority_id' => $authority->id, 'complaint_state_id' => Complaint::ON_ATTENTION]);
        // Create 2 attended
        factory(Complaint::class, 2)->create(['authority_id' => $authority->id, 'complaint_state_id' => Complaint::ATTENDED]);

        $this->assertTrue(Complaint::completed()->count() == 10);
        $this->assertTrue(Complaint::incompleted()->count() == 2);
    }
}
