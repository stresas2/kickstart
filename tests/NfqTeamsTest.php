<?php

namespace App\Tests;

use App\Services\NfqTeams;
use PHPUnit\Framework\TestCase;

class NfqTeamsTest extends TestCase
{
    /** @var NfqTeams */
    private $twoTeams = null;

    public function setUp(): void
    {
        $this->twoTeams = new NfqTeams(
            [
                'academyui' => [
                    'mentors' => ['Jonas Jonaitis'],
                    'students' => ['Petras Petraitis', 'Gedas Gražauskas'],
                ],
                'supperreal' => [
                    'mentors' => ['Vardenis Pavardenis', 'Ada Kalbenė'],
                    'students' => ['Vytautas Vėjūnas'],
                ],
            ]
        );
    }

    public function testEmpty()
    {
        $teams = new NfqTeams([]);
        $this->assertNull($teams->getTeamByMember('notExisting'));
        $this->assertNull($teams->getTeamByMentor('notExisting'));
    }

    public function testValidMentor()
    {
        $teams = $this->twoTeams;
        $this->assertEquals('academyui', $teams->getTeamByMentor('Jonas Jonaitis'));
        $this->assertEquals('supperreal', $teams->getTeamByMentor('Ada Kalbenė'));
    }

    public function testValidMember()
    {
        $teams = $this->twoTeams;
        $this->assertEquals('academyui', $teams->getTeamByMember('Gedas Gražauskas'));
        $this->assertEquals('supperreal', $teams->getTeamByMember('Vytautas Vėjūnas'));
    }

    public function testInvalidMember()
    {
        $teams = $this->twoTeams;
        $this->assertNull($teams->getTeamByMember('Neegzistuojantis'));
    }

    public function testInvalidMentor()
    {
        $teams = $this->twoTeams;
        $this->assertNull($teams->getTeamByMentor('Neegzistuojantis'));
    }
}
