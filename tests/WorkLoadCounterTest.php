<?php

namespace App\Tests;

use App\Services\NfqTeams;
use App\Services\WorkLoadCounter;
use PHPUnit\Framework\TestCase;

class WorkLoadCounterTest extends TestCase
{
    public function testOneMentorHelpsMultipleTeams()
    {
        $teams = new NfqTeams([
            'a' => [
                'mentors' => ['Jonas', 'Petras']
            ],
            'b' => [
                'mentors' => ['Jonas']
            ]
        ]);
        $workLoadCounter = new WorkLoadCounter($teams, ['Jonas', 'Petras']);
        $this->assertEquals(2, $workLoadCounter->studentsCount('a'));
        $this->assertEquals(0, $workLoadCounter->studentsCount('Not existing'));
    }
}
