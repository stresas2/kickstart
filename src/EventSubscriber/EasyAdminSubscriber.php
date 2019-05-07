<?php

namespace App\EventSubscriber;

use EasyCorp\Bundle\EasyAdminBundle\Event\EasyAdminEvents;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class EasyAdminSubscriber implements EventSubscriberInterface
{
    public function onEasyAdminPreUpdate($event)
    {
        //FIXME: only for testing
        var_dump($event);
        DIE();
    }

    public static function getSubscribedEvents()
    {
        return [
           EasyAdminEvents::PRE_UPDATE => 'onEasyAdminPreUpdate',
        ];
    }
}
