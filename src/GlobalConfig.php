<?php


namespace App;


class GlobalConfig
{
    public static \Doctrine\ORM\EntityManager $entityManager;
    public static \Twig\Environment $twig;
    public static string $domain = 'blog';
}
