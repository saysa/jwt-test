<?php
/**
 * Created by PhpStorm.
 * User: saysa
 * Date: 2018-12-27
 * Time: 16:32
 */

namespace App\Loader;

use App\Repository\PhoneRepository;

class PhonesLoader
{
    /**
     * @var PhoneRepository
     */
    private $phoneRepository;

    /**
     * PhonesLoader constructor.
     *
     * @param PhoneRepository $phoneRepository
     */
    public function __construct(PhoneRepository $phoneRepository)
    {
        $this->phoneRepository = $phoneRepository;
    }

    public function load()
    {
        return $this->phoneRepository->findAll();
    }
}