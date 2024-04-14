<?php

namespace App\MessageHandler;

use App\Message\ProcessEmailMessage;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
final class ProcessEmailMessageHandler
{
    public function __invoke(ProcessEmailMessage $message)
    {
        // do something with your message
    }
}
