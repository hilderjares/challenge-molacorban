<?php

date_default_timezone_set('America/Sao_Paulo');

$vendor = __DIR__.'/../vendor/autoload.php';

if (!file_exists($vendor)) {
    throw new RuntimeException('Install dependencies to run this script.');
}

require $vendor;

use App\Core\ConferenceManager;
use App\Core\ProcessTxtFile;
use App\Entity\Conference;
use App\Exceptions\InvalidTimeException;

$file = $argv[1];

if (!file_exists($vendor)) {
    throw new RuntimeException('Cannot found talks :(');
}

$processConference = new ProcessTxtFile($file);
$conferenceManger = new ConferenceManager();

$phpBrasil = new Conference();
$phpBrasil->setName("php brasil");
$phpBrasil->setDate(new DateTime());

try {
    $conferenceManger->makeTalks($processConference);
    $phpBrasil->setSessions($conferenceManger->makeSchedules());

    printEventSchedule($phpBrasil);
} catch (InvalidTimeException $invalidTimeException) {
    print $invalidTimeException->getMessage();
} catch (Exception $exception) {
    print $exception->getMessage();
}
