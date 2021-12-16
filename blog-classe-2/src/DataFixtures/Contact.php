<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class Contact extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $contact = new \App\Entity\Contact();
        $contact->setFirstname('alex');
        $contact->setName('soyer');

        $manager->persist($contact);

        $manager->flush();
    }
}
