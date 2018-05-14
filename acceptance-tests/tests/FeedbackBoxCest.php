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

    /**
     * @param AcceptanceTester $I user
     * @throws Exception
     */
    public function sendProductRequest(AcceptanceTester $I)
    {
        $I->am("Interested buyer");
        $I->amOnPage('/');
        $inputText = 'I want to buy product A, can I get some discount if I am buying two items?';
        $I->fillField('#feedback-form textarea', $inputText);
        $I->click('#feedback-form button[type="submit"]');

        $I->waitForElement('.feedback-results');
        $I->amRedirectedTo('/feedback/conversation');
        $I->dontSee('Warning');
        $I->dontSee('Error');
        $I->canSee($inputText, '.feedback-results .question');
        $contactText = 'Thank you for your feedback. Call our sales +370 37 793 515 and get the best deal.';
        $I->canSee($contactText, '.feedback-results .answer');
    }

    // Should be removed if using TravisCI or similar Continuous integration server
    public function _failed(AcceptanceTester $I)
    {
        $I->pauseExecution();
    }
}
