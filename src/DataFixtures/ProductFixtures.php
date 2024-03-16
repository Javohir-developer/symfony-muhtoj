<?php

namespace App\DataFixtures;

use App\Entity\Frontend\Category;
use App\Entity\Frontend\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ProductFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $category = new Category();
        $category->setName('Smartfon');
        $manager->persist($category);

        $product1 = new Product();
        $product1->setCategory($category);
        $product1->setName('Samsung');
        $product1->setPrice('100');
        $product1->setDiscreption('Сервис проверки текста на уникальность и биржа копирайтинга. ... ');
        $manager->persist($product1);

        $product2 = new Product();
        $product2->setCategory($category);
        $product2->setName('LG');
        $product2->setPrice('124');
        $product2->setDiscreption('Text.ru – это популярный портал для проверки текстов и крупнейшая биржа текстового контента. Читать ещё');
        $manager->persist($product2);

        $product3 = new Product();
        $product3->setCategory($category);
        $product3->setName('Artel');
        $product3->setPrice('234');
        $product3->setDiscreption(' уникальность и биржа копирайтинга. ... Text.ru – это популярный порт');
        $manager->persist($product3);

        $product4 = new Product();
        $product4->setCategory($category);
        $product4->setName('Redme');
        $product4->setPrice('456');
        $product4->setDiscreption('лярный портал для проверки текстов и крупнейшая биржа текстового контента. Читать ещё');
        $manager->persist($product4);

        $manager->flush();
    }
}
