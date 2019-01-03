<?php

namespace App\Controller;

use App\Loader\PhonesLoader;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\SerializerInterface;

class ListPhonesController
{
    /**
     * @var PhonesLoader
     */
    private $loader;

    /**
     * @var Serializer
     */
    private $serializer;

    /**
     * ListPhonesController constructor.
     *
     * @param PhonesLoader $loader
     * @param SerializerInterface $serializer
     */
    public function __construct(PhonesLoader $loader, SerializerInterface $serializer)
    {
        $this->loader     = $loader;
        $this->serializer = $serializer;
    }

    /**
     * @Route(path="/phones", name="phones_list", methods={"GET"})
     * @param Request $request
     *
     * @return Response
     */
    public function list(Request $request)
    {
       $phones = $this->loader->load();

       $phones = $this->serializer->serialize($phones, 'json');

       return new Response($phones);
    }
}