<?php
/**
 * User: david
 * Date: 16/12/12
 */

require_once '../vendor/autoload.php';

use Guzzle\Tests\GuzzleTestCase;
use Acilia\CampaignCommander\NmpReporting\NmpReportingClient;

class NmpReportingClientClass extends GuzzleTestCase
{

    public function testBuildClient()
    {
        $client = NmpReportingClient::factory(array());
        $this->assertInstanceOf('\\Acilia\\CampaignCommander\\NmpReporting\\NmpReportingClient', $client);
    }

}
