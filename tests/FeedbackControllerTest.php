<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class FeedbackControllerTest extends WebTestCase
{
    public function testTalkBoxIsOnHomePage()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/');

        $this->assertSame(200, $client->getResponse()->getStatusCode());
        $this->assertSame(1, $crawler->filter('#feedback-form textarea')->count());
        $this->assertSame("Send", $crawler->filter('#feedback-form button[type=submit]')->first()->text());
    }
}
