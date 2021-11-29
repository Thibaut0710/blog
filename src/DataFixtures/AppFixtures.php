<?php

namespace App\DataFixtures;

use App\Entity\Article;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $citiesToCreate = ["blog","new","tuto","podcast"];
        foreach($citiesToCreate as $cityName){
            $city = new Article();
            $city->setNom($cityName);
            $manager->persist($city);
        }
        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }
}
