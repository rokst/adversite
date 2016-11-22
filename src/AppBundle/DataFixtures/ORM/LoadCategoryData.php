<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Category;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadCategoryData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $category = new Category();
        $category->setName('TV');
        $manager->persist($category);
        $manager->flush();

        $category = new Category();
        $category->setName('Computers');
        $manager->persist($category);
        $manager->flush();

        $category = new Category();
        $category->setName('Mobile Phones');
        $manager->persist($category);
        $manager->flush();

        $category = new Category();
        $category->setName('Speakers');
        $manager->persist($category);
        $manager->flush();

        $category = new Category();
        $category->setName('Keyboards');
        $manager->persist($category);
        $manager->flush();
    }
}