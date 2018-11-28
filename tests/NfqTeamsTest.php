<?php

namespace App\Tests;

use App\Services\NfqTeams;
use PHPUnit\Framework\TestCase;

class NfqTeamsTest extends TestCase
{
    public function testEmpty()
    {
        $teams = new NfqTeams([]);
        $this->assertNull($teams->getTeamByMember('notExisting'));
        $this->assertNull($teams->getTeamByMentor('notExisting'));
    }

    public function testValidMentor()
    {
        $teams = new NfqTeams(
            [
                'academyui' => [
                    'mentors' => ['Jonas Jonaitis'],
                    'students' => ['Petras Petraitis', 'Gedas Gražauskas']
                ],
                'supperreal' => [
                    'mentors' => ['Vardenis Pavardenis', 'Ada Kalbenė'],
                    'students' => ['Vytautas Vėjūnas']
                ],
            ]
        );
        $this->assertEquals('academyui', $teams->getTeamByMentor('Jonas Jonaitis'));
        $this->assertEquals('supperreal', $teams->getTeamByMentor('Ada Kalbenė'));
    }

    public function testValidMember()
    {
        $teams = new NfqTeams(
            [
                'academyui' => [
                    'mentors' => ['Jonas Jonaitis'],
                    'students' => ['Petras Petraitis', 'Gedas Gražauskas']
                ],
                'supperreal' => [
                    'mentors' => ['Vardenis Pavardenis', 'Ada Kalbenė'],
                    'students' => ['Vytautas Vėjūnas']
                ],
            ]
        );
        $this->assertEquals('academyui', $teams->getTeamByMember('Gedas Gražauskas'));
        $this->assertEquals('supperreal', $teams->getTeamByMember('Vytautas Vėjūnas'));
    }
}
