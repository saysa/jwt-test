<?php

namespace App\DataFixtures;


use App\Entity\Phone;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class PhoneFixtures extends Fixture
{
    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $phones = [
            [
                'os' => 'android',
                'brand' => 'huawei',
            ],
            [
                'os' => 'ios',
                'brand' => 'apple',
            ],
            [
                'os' => 'toto',
                'brand' => 'ericsson',
            ],
            [
                'os' => 'windows',
                'brand' => 'samsung',
            ],
        ];

        foreach ($phones as $values) {

            $phone = new Phone();
            $phone->setBrand($values['brand']);
            $phone->setOs($values['os']);

            $manager->persist($phone);
        }

        $manager->flush();
    }
}