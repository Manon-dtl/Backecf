<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Client;
use Symfony\Component\Validator\Constraints\Date;

class ClientFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for($i = 1; $i <=10; $i++){
            $client = new Client();
            $client->setNom("Nom du Client n°$i")
                    ->setPrenom("Prenom du Client n°$i")
                    ->setDateDeNaissance(new \DateTime())
                    ->setAdresse("Adresse: $i")
                    ->setCodePostal("83210")
                    ->setNumeroDeTelephone("06")
                    ->setStatutMarital("1");

            $manager->persist($client);
        }

        $manager->flush();
    }
}