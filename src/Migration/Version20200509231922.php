<?php

declare(strict_types=1);

namespace App\Migration;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200509231922 extends AbstractMigration
{
    public function getDescription() : string
    {
        return 'Fill table with some data';
    }

    public function up(Schema $schema) : void
    {
        $this->addSql('insert into users set id = :id, name = :name, avatarUrl = :avatarUrl, email = :email, password = :password, createdAt = :createdAt, updatedAt = :updatedAt', [
            'id' => 1,
            'name' => 'John',
            'avatarUrl' => '1.jpg',
            'email' => 'johndoe@gmail.com',
            'password' => '123',
            'createdAt' => date('Y-m-d H:i:s'),
            'updatedAt' => date('Y-m-d H:i:s'),
        ]);

        $this->addSql('insert into users set id = :id, name = :name, avatarUrl = :avatarUrl, email = :email, password = :password, createdAt = :createdAt, updatedAt = :updatedAt', [
            'id' => 2,
            'name' => 'Margaret',
            'avatarUrl' => '2.jpg',
            'email' => 'margaretjlatham@gmail.com',
            'password' => '1234',
            'createdAt' => date('Y-m-d H:i:s'),
            'updatedAt' => date('Y-m-d H:i:s'),
        ]);

        $this->addSql('insert into posts set id = :id, title = :title, imageUrl = :imageUrl, content = :content, shortDescription = :shortDescription, createdAt = :createdAt, updatedAt = :updatedAt, user_id = :user_id', [
            'id' => 1,
            'title' => 'Laravel',
            'imageUrl' => 'laravel.png',
            'content' => '<p>This is one of the most popular open-source PHP frameworks, that was introduced in 2011. Lavarel helps developers in building the most robust web applications by simplifying common tasks like caching, security, routing, and authentication.</p>
                <strong>Advantages of Lavarel</strong>
                <ol>
                  <li>Lavarel has features that make it a great platform to develop robust apps with the complex backend.</li>
                  <li>It allows for customization of apps to fit the developer’s needs. These include data migration, security, and MVC architecture support.</li>
                  <li>Lavarel also allows for the development of speedy and highly secure web applications. Since security is an important aspect of web app development, you should consider this platform for your apps.</li>
                </ol>',
            'shortDescription' => 'This is one of the most popular open-source PHP frameworks',
            'user_id' => 1,
            'createdAt' => date('Y-m-d H:i:s'),
            'updatedAt' => date('Y-m-d H:i:s'),
        ]);

        $this->addSql('insert into posts set id = :id, title = :title, imageUrl = :imageUrl, content = :content, shortDescription = :shortDescription, createdAt = :createdAt, updatedAt = :updatedAt, user_id = :user_id', [
            'id' => 2,
            'title' => 'Symfony',
            'imageUrl' => 'symfony.png',
            'content' => '<p>The Symfony is among the earliest PHP framework, and it has been in existence since 2005. Due to the many years of existence, Symfony has become a reliable framework for developing web applications. It is also known as an extensive PHP MVC framework that follows all the PHP standards.</p>
                <p>Symfony shares many similar features with Lavarel making it difficult to choose one over the other.</p>
                <strong>Advantages of Symphony</strong>
                <ol>
                  <li>It is flexible and can, therefore, be integrated with other projects including Drupal. You can therefore easily install it and use it on various platforms</li>
                  <li>Symfony allows for fast app development due to its reusable components, a module system, and it requires just a small memory space</li>
                  <li>It also allows for interoperability. This enables developers to use various software building blocks such as forms management and translation management</li>
                </ol>',
            'shortDescription' => 'The Symfony is among the earliest PHP framework',
            'user_id' => 2,
            'createdAt' => date('Y-m-d H:i:s'),
            'updatedAt' => date('Y-m-d H:i:s'),
        ]);

        $this->addSql('insert into posts set id = :id, title = :title, imageUrl = :imageUrl, content = :content, shortDescription = :shortDescription, createdAt = :createdAt, updatedAt = :updatedAt, user_id = :user_id', [
            'id' => 3,
            'title' => 'Yii',
            'imageUrl' => 'yii.png',
            'content' => '<p>The Yii backend development framework is a relatively new programming network released in 2008. This framework is ideal for all kind of web apps. Given that it is new to the industry, it helps brings incorporates new invention like lazy loading in the development of web apps. Modern apps that use lazy loading technique have fast loading time.</p>
                <strong>Advantages of Yii</strong>
                <ol>
                  <li>Interoperability with other frameworks like Zend</li>
                  <li>It is a lightweight framework with high performance and great speed</li>
                  <li>Has security features like cookie tampering and SOL injection to protect your web apps from possible attacks. This makes it a great choice for e-commerce projects and CMS forums</li>
                  <li>You cannot create complex web apps with this framework</li>
                </ol>',
            'shortDescription' => 'The Yii backend development framework is a relatively new programming network released in 2008',
            'user_id' => 1,
            'createdAt' => date('Y-m-d H:i:s'),
            'updatedAt' => date('Y-m-d H:i:s'),
        ]);

        $this->addSql('insert into posts set id = :id, title = :title, imageUrl = :imageUrl, content = :content, shortDescription = :shortDescription, createdAt = :createdAt, updatedAt = :updatedAt, user_id = :user_id', [
            'id' => 4,
            'title' => 'Zend',
            'imageUrl' => 'zend.png',
            'content' => '<p>The Zend is an object-oriented framework. As such it is extendable to allow developers to incorporate functionalities that suit their projects. It also contains Zend components to help create web apps with improved functionalities.</p>
                <strong>Advantages of Zend</strong>
                <ul>
                  <li>It is community oriented with an extended community base</li>
                  <li>Highly flexible with additional that allow developers to custom create apps that fit their needs. There are also Zend components to allow developers to choose their desired components to increase their app functionality</li>
                  <li>Excellent speed and efficiency</li>
                  <li>The library components are lightweight with high functionality</li>
                </ul>',
            'shortDescription' => 'The Zend is an object-oriented framework',
            'user_id' => 2,
            'createdAt' => date('Y-m-d H:i:s'),
            'updatedAt' => date('Y-m-d H:i:s'),
        ]);
    }

    public function down(Schema $schema) : void
    {
        $this->addSql('truncate table posts');
        $this->addSql('truncate table users');
    }
}
