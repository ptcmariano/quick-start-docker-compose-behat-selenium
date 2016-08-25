<?php

namespace Tests\Functional;

use Behat\MinkExtension\Context\MinkContext;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Behat\Hook\Scope\AfterStepScope;
use Behat\Mink\Driver\Selenium2Driver;
use Behat\Behat\Context\Context;
use PHPUnit\Framework\TestCase;

class AppContext extends MinkContext
{
    const RESULT_CODE_FAIL = 99;
    protected $screenshotPath;
    /**
     * @AfterStep
     */
    public function capturarFalha(AfterStepScope $scope)
    {
        if (self::RESULT_CODE_FAIL === $scope->getTestResult()->getResultCode()) {
            $this->tirarPrintScreen();
        }
    }

    public function getScreenshotPath()
    {
        if (empty($this->screenshotPath)) {
            $this->screenshotPath = getcwd();
        }
        return $this->screenshotPath;
    }

    public function tirarPrintScreen()
    {
        $driver = $this->getSession()->getDriver();
        if (!$driver instanceof Selenium2Driver) {
            return;
        }
        date_default_timezone_set('UTC');
        $fileName = date('d-m-y h_i_s') . '-' . uniqid() . '.png';
        $filePath = $this->getScreenshotPath();
        $this->saveScreenshot($fileName, $filePath);
        print 'Screenshot at: ' . $filePath . $fileName;
    }

    /**
     * @Given a page load wordpress
     */
    public function aPageLoadWordpress()
    {
        $this->visit('http://wordpress/');
    }

    /**
     * @Then see a title of my blog
     */
    public function seeATitleOfMyBlog()
    {
        $this->tirarPrintScreen();
        TestCase::assertEquals(1, 1);//TODO: get element and compare with expect
    }
}
