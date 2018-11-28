<?php

namespace App\Services;


class NfqTeams implements TeamsInterface
{
    private $data = [];

    /**
     * NfqKaunasTeams constructor.
     *
     * @param string[][] $data ['teamName' => ['mentors' => ..., 'students' => ''], ...]
     */
    public function __construct(array $data = [])
    {
        $this->data = $data;
    }

    public function getTeamByMember(string $name): ?string
    {
        return null;
    }

    public function getTeamByMentor(string $name): ?string
    {
        return null;
    }
}