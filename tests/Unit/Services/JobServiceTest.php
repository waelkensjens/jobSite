<?php

namespace Services;

use App\Services\Contracts\JobServiceContract;
use App\Services\JobService;
use Tests\TestCase;

class JobServiceTest extends TestCase
{
    protected array $jobData;

    protected JobService $jobService;

    protected function setUp(): void
    {
        $this->jobService = app(JobServiceContract::class);

        $this->jobData = [
            'title' => 'Laravel(php) developer',
            'description' => 'description',
            'content' => 'long content',
            'company_id' => 1,
            'type_id' => 1,
        ];

        parent::setUp(); // TODO: Change the autogenerated stub
    }

    /** @test  */
    public function it_can_create_a_job()
    {
        $job = $this->jobService->createJob(
            data: $this->jobData
        );

        dd($job);

        $this->assertTrue(true);
    }
}
