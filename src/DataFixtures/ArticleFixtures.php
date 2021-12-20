<?php

namespace App\DataFixtures;

use App\Entity\Article;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;


class ArticleFixtures extends Fixture implements DependentFixtureInterface
{


    public function load(ObjectManager $manager): void
    {

        $article = new Article();
        $article->setTitle('Titre Article');
        $article->setContent('Lorem Ipsum');
        $article->setCategory($this->getReference(CategoryFixtures::ACTUS));
        $manager->persist($article);

        for ($i = 0; $i < 10; $i++) {
            $article = new Article();
            $article->setTitle('Title' .$i);
            $article->setContent('Lorem Ipsum' .$i);
            $manager->persist($article);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            CategoryFixtures::class,
        ];
    }
}
