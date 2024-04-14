<?php

namespace App\Controller;
use App\Message\ProcessEmailMessage;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Routing\Annotation\Route;

class EmailController extends AbstractController
{

    #[Route(path: '/process-email', name:'process_email')]
    public function processEmail(MessageBusInterface $messageBus): Response
    {
        // Create a message object with the data you want to pass
        $emailData = [
          'to' => 'recipient@exemple.com',
          'subject' => 'Hello',
          'body' => 'This is a test email.'
        ];
        $message = new ProcessEmailMessage($emailData);

        // Dispatch the message
        $messageBus->dispatch($message);

        return new Response('Email processing started.');
    }
}