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
     *
     * @throws \Exception
     */
    public function load(ObjectManager $manager)
    {
        $phones = [
            [
                'os' => 'android',
                'brand' => 'huawei',
                'updatedAt' => new \DateTime('2018-08-08 13:23:22'),
            ],
            [
                'os' => 'ios',
                'brand' => 'apple',
                'updatedAt' => new \DateTime('2018-09-08 13:23:22'),
            ],
            [
                'os' => 'toto',
                'brand' => 'ericsson',
                'updatedAt' => new \DateTime('2018-10-08 13:23:22'),
            ],
            [
                'os' => 'windows',
                'brand' => 'samsung',
                'updatedAt' => new \DateTime('2018-11-08 13:23:22'),
            ],
        ];

        foreach ($phones as $values) {

            $phone = new Phone();
            $phone->setBrand($values['brand']);
            $phone->setOs($values['os']);
            $phone->setUpdatedAt($values['updatedAt']);

            $manager->persist($phone);
        }

        $manager->flush();
    }
}