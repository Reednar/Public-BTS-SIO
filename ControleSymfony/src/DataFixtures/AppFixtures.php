<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Contact;
use App\Entity\Categorie;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    public function __construct(UserPasswordEncoderInterface $encoder){
        $this->encoder = $encoder;
    }
    
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr-FR');
        //Nous gérons les catégories

            $categorie = new Categorie();
            $categorie->setDesignation('amis');
            $manager->persist($categorie);

            $categorie2 = new Categorie();
            $categorie2->setDesignation('professionnels');
            $manager->persist($categorie2);

            $categorie3 = new Categorie();
            $categorie3->setDesignation('connaissances');
            $manager->persist($categorie3);

            $categories=[$categorie, $categorie2, $categorie3];
        

        //Nous gérons les contacts
        $contacts = [];
        $genres =['male', 'female'];
        for($i = 1; $i <= 20; $i++){
            $contact = new Contact();

            $genre =$faker->randomElement($genres);

            $picture = 'https://randomuser.me/api/portraits/';
            $pictureId = $faker->numberBetween(1, 99) . '.jpg';

            $picture .= ($genre == 'male' ? 'men/' : 'women/') . $pictureId;
            $j = mt_rand(0, 2);
            $contact->setPrenom($faker->firstname($genre))
                 ->setNom($faker->lastname)
                 ->setCategorie($categories[$j])
                 ->setMail($faker->email)
                 ->setAdresse($faker->address())
                 ->setCodepostal($faker->countryCode())
                 ->setVille($faker->city())
                 ->setTelephone($faker->phoneNumber())
                 ->setAvatar($picture);

                 $manager->persist($contact);
                 $users[] = $contact;
        }

        $manager->flush();
    }
}
