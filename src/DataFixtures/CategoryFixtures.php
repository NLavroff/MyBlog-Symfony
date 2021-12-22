<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
    public const CATEGORY = [
        'Thaïlande',
        'Canada',
        'Monténégro',
        'Cinq Terres',
        'Islande'
    ];

    public function load(ObjectManager $manager): void
    {
        /*$category = new Category();
        $category->setName('Example');
        $this->setReference(self::CATEGORY, $category);
        $manager->persist($category);*/

        foreach (self::CATEGORY as $key => $name) {
            $category = new Category();
            $category->setName($name);
            $manager->persist($category);
            $this->setReference('CATEGORY' .$key, $category);
        }

        $manager->flush();
    }
}
