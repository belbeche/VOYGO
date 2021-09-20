<?php

namespace App\DataFixtures;

use Faker;
use App\Entity\User;
use App\Entity\Chambres;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    public function __construct(UserPasswordHasherInterface  $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');

        for ($i = 0; $i < 20; $i++) {
            $chambres = new Chambres();
            $user = new User();
            $chambres->setTitre($faker->name);
            $chambres->setContenu($faker->text);
            $chambres->setCreatedAt((new \DateTimeImmutable('now')));
            $chambres->setNbPlacesDispo($faker->numberBetween(0, 100));
            $chambres->setImage('https://picsum.photos/200/300.jpg');
            $user->addChambre($chambres);
            $user->setUsername($faker->name);
            $user->setPassword($this->passwordHasher->hashPassword(
                $user,
                'admin'
            ));
            $user->setRoles(['ROLE_ADMIN']);
            $manager->persist($chambres);
            $manager->persist($user);
        }

        $manager->flush();
    }
}
