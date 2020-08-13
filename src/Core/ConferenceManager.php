<?php

declare(strict_types=1);

namespace App\Core;

use App\Entity\Session;
use App\Entity\Talk;
use App\Exceptions\InvalidTimeException;
use App\Traits\ExtractValuesTrait;
use App\Validator\FileValidator;
use ArrayObject;

class ConferenceManager
{
    use ExtractValuesTrait;

    private array $talks;
    private ArrayObject $sessions;
    private FileValidator $validator;

    public function __construct()
    {
        $this->sessions = new ArrayObject();
        $this->validator = new FileValidator();
    }

    public function makeTalks(ProcessTxtFile $processedTxtFile): void
    {
        foreach ($processedTxtFile->read() as $line) {
            if (!$this->validator->isValid($line)) {
                throw new InvalidTimeException("The time should be 45min or 60min or 30min or lighting");
            }

            if ($line !== "\n") {
                $this->talks[] = new Talk(str_replace("\n", "", $line), $this->extractTime($line));
            }
        }
    }

    public function makeSchedules(): ArrayObject
    {
        usort($this->talks, fn ($talkOne, $talkTwo) => $talkOne->getTime() <= $talkTwo->getTime());

        $firstSession = new Session();
        $firstSession->setId(0);
        $this->sessions->offsetSet(0, $firstSession);

        $sizeOfSession = fn ($index) => $index % 2 == 0 ? 180 : 240;

        foreach ($this->talks as $talk) {
            $needCreateNewSession = true;
            foreach ($this->sessions as $session) {
                if ($session->getTotalTime() + $talk->getTime() <= $sizeOfSession($session->getId())) {
                    $session->addTalk($talk);
                    $session->setTotalTime($session->getTotalTime() + $talk->getTime());
                    $needCreateNewSession = false;
                    break;
                }
            }

            if ($needCreateNewSession) {
                $index = $this->sessions->count();
                $newSession = new Session();
                $newSession->setId($index);

                $this->sessions->offsetSet($index, $newSession);
                $this->sessions->offsetGet($index)->addTalk($talk);
                $this->sessions->offsetGet($index)->setTotalTime($this->sessions->offsetGet($index)->getTotalTime() + $talk->getTime());
            }
        }

        return $this->sessions;
    }
}
