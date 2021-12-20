<?php

namespace App\DataFixtures;

use App\Entity\Article;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ArticleFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $article = new Article();
        $article->setTitle('Lorem');
        $article->setContent('Lorem Ipsum');
        $article->setCategory($this->getReference(CategoryFixtures::CATEGORY));
        $manager->persist($article);

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            CategoryFixtures::class,
        ];
    }
}
