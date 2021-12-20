<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
    public const CATEGORY = 'CATEGORY_SAMPLE';

    public function load(ObjectManager $manager): void
    {
        $category = new Category();
        $category->setName('Example');
        $this->setReference(self::CATEGORY, $category);
        $manager->persist($category);

        for ($i = 0; $i < 5; $i++) {
            $category = new Category();
            $category->setName('name'.$i);
            $manager->persist($category);
        }

        $manager->flush();
    }
}
