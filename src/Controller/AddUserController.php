<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class AddUserController
{
    /**
     * @var SerializerInterface
     */
    private $serializer;

    /**
     * AddUserController constructor.
     *
     * @param SerializerInterface $serializer
     */
    public function __construct(SerializerInterface $serializer)
    {
        $this->serializer = $serializer;
    }

    /**
     * @Route(path="/add/user", name="add_user", methods={"POST"})
     * @param Request $request
     *
     * @return Response
     */
    public function add(Request $request)
    {
        $user = $this->serializer->deserialize($request->getContent(), User::class, 'json');

        return new Response('', Response::HTTP_CREATED);
    }
}