<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{

    private $ph;

    public function __construct(UserPasswordHasherInterface $ph)
    {
        $this->ph = $ph;
    }
    
    public function load(ObjectManager $manager): void
    {
        $user = new User();

        $user->setEmail('test@gmail.com');
        $user->setRoles(['ROLE_ADMIN']);
        $user->setPassword($this->ph->hashPassword($user, 'password'));

        $manager->persist($user);

        $manager->flush();
    }
}
