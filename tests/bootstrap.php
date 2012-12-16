<?php

require '../vendor/autoload.php';

$mockDir = __DIR__ . DIRECTORY_SEPARATOR . 'mock';
\Guzzle\Tests\GuzzleTestCase::setMockBasePath($mockDir);
\Guzzle\Tests\GuzzleTestCase::setServiceBuilder(
    array(
        'test.nmp-reporting' => array("class" => "Acilia.CampaignCommander.NmpReportingClient")
    )
);



