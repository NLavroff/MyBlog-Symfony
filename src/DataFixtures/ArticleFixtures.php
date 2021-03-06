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
        /*$article = new Article();
        $article->setTitle('Lorem');
        $article->setContent('Lorem Ipsum');
        $article->setCategory($this->getReference(CategoryFixtures::CATEGORY));
        $manager->persist($article);*/

        foreach (CategoryFixtures::CATEGORY as $key => $category) {
            for ($i = 0; $i < 5; $i++) {
                $article = new Article();
                $article->setTitle('Article ' .$i);
                $article->setContent('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim...');
                $article->setCategory($this->getReference('CATEGORY' . $key));
                $article->setImage('image');
                $manager->persist($article);
            }
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
