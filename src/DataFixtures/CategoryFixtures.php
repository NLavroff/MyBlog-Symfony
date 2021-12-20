<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
    public const ACTUS = 'ACTUS';

    public function load(ObjectManager $manager): void
    {
        $category = new Category();
        $category->setCategoryName('ACTUS');
        $this->setReference(self::ACTUS, $category);
        $manager->persist($category);
    
        for ($i = 0; $i < 10; $i++) {
            $category = new Category();
            $category->setCategoryName('CategoryName' .$i);
            $manager->persist($category);
            }

        $manager->flush();
    }
}
