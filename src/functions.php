<?php

use App\Entity\Conference;

function dd($data)
{
    var_dump($data);
    die();
}

function printEventSchedule(Conference $conference)
{
    $index = 0;
    foreach ($conference->getSessions() as $session) {
        $startTimeMorning = (new DateTimeImmutable())->setTime(9, 0, 0);
        $startTimeAfternoon = (new DateTimeImmutable())->setTime(1, 0, 0);

        foreach ($session->getTalks() as $talk) {
            if ($session->getId() % 2 === 0) {
                $startTimeMorningFormatted = $startTimeMorning->format('h:i:s');
                print("{$startTimeMorningFormatted} - {$talk->getTitle()} \n");
                $startTimeMorning = $startTimeMorning->add(DateInterval::createFromDateString($talk->getTime().'minutes'));
            }

            if ($session->getId() % 2 !== 0) {
                $startTimeAfternoonFormatted = $startTimeAfternoon->format('h:i:s');
                print("{$startTimeAfternoonFormatted} - {$talk->getTitle()} \n");
                $startTimeAfternoon = $startTimeAfternoon->add(DateInterval::createFromDateString($talk->getTime().'minutes'));
            }
        }

        if ($index % 2 === 0) {
            print "12:00 - Lunch \n";
        } else {
            print "05:00 - Networking Event \n";
        }
        $index++;
    }
}
