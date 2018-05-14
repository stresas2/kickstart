<?php


class FeedbackBoxCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    public function _after(AcceptanceTester $I)
    {
    }

    // tests
    public function tryToTest(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        $I->wait(5); // seconds
        $I->see('Your feedback');
        $title = $I->executeJS('return document.title');
        $I->comment("Testing: " . $title);
        $I->waitForElement('not > existing#element to.fail', 5); // Fail after 5 seconds timeout
    }

    // Should be removed if using TravisCI or similar Continuous integration server
    public function _failed(AcceptanceTester $I)
    {
        $I->pauseExecution();
    }
}
