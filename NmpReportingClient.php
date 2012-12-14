<?php

/**
 * User: David Castello
 * Date: 14/12/12
 */

namespace Acilia\CampaignCommander\NmpReporting;

use Guzzle\Common\Collection;
use Guzzle\Service\Client;
use Guzzle\Service\Description\ServiceDescription;

class NmpReportingClient extends Client
{
    /**
     * Factory method to create a new NmpReportingClient
     *
     * The following array keys and values are available options:
     * - base_url: Base URL of web service
     * - scheme:   URI scheme: http or https
     * - login: API login
     * - password: API password
     * - key: API Key
     *
     * @param array|Collection $config Configuration data
     *
     * @return self
     */
    public static function factory($config = array())
    {
        $default = array(
            'base_url' => '{scheme}://{server}/apinmpreporting',
            'scheme' => 'https',
            'server' => 'p4apic.emv2.com'
        );
        $required = array('scheme', 'server');
        $config = Collection::fromConfig($config, $default, $required);
        $client = new self($config->get('base_url'), $config);

        // Attach a service description to the client
        $description = ServiceDescription::factory(__DIR__ . '/client.json');
        $client->setDescription($description);

        return $client;
    }
}
