<?php 

namespace Facebook\WebDriver;
require 'vendor/autoload.php';


use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;

$host = 'http://localhost:4444/wd/hub';
$capabilities = DesiredCapabilities::firefox();
$driver = RemoteWebDriver::create($host,$capabilities,5000);
$driver->get('http://docs.seleniumhq.org/');
$bdc = $driver->findElement(
		WebDriverBy::id('menu_about')
	);
$bdc->click();

$search =$driver->findElement(
		WebDriverBy::id('q')
	);

$search->sendKeys('php')->submit();
// wait at most 10 seconds until at least one result is shown
$driver->wait(10)->until(
  WebDriverExpectedCondition::presenceOfAllElementsLocatedBy(
    WebDriverBy::className('gsc-result')
  )
);