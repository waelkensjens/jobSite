<?php

namespace Models;

use App\Models\Company;
use App\Models\Job;
use App\Models\Type;
use Tests\TestCase;

class JobTest extends TestCase
{

    protected string $table;

    protected function setUp(): void
    {
        $this->table = 'jobs';
        parent::setUp(); // TODO: Change the autogenerated stub
    }

    /**
     * Test factory is working
     *
     * @test
     */
    public function it_can_create()
    {
       Job::factory()->create();

        $this->assertDatabaseCount($this->table, 1);
    }

    /**
     * Test company relation
     *
     * @test
     */
    public function a_job_can_belongs_to_one_company()
    {
        $company = Company::factory()->create();
        $job = Job::factory()->forCompany($company)->create();

        $this->assertInstanceOf(Company::class, $job->company);
    }

    /**
     * Test type relation
     *
     * @test
     */
    public function a_job_has_one_type()
    {
        $type = Type::factory()->create();

        $job = Job::factory()->forType($type)->create();

        $this->assertInstanceOf(Type::class, $job->type);
    }
}