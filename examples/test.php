<?php
/**
 * User: david
 * Date: 14/12/12
 */

require_once '../vendor/autoload.php';

use Acilia\CampaignCommander\NmpReporting\NmpReportingClient;

try {

    $nmpReportingClient = NmpReportingClient::factory();

    // Obtenemos token
    $command = $nmpReportingClient->getCommand(
        'OpenConnection',
        array(
            'login' => 'LOGIN',
            'pwd' => 'PWD',
            'key' => 'KEY'
        )
    );

    $command = $nmpReportingClient->execute($command);
    $token = $command->getResult();

    // Obtenemos listado
    $command = $nmpReportingClient->getCommand(
        'BounceReport',
        array('token' => $token)
    );

    $nmpReportingClient->execute($command);
    print_r($command->getResult());

    // Cerramos conexion
    $command = $nmpReportingClient->getCommand(
        'CloseConnection',
        array('token' => $token)
    );
    $nmpReportingClient->execute($command);


} catch (\Exception $exception) {
    echo "Exception: " . $exception->getMessage() . "\r\n";
}
