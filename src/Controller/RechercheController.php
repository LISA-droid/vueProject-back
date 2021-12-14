<?php

namespace App\Controller;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\CategoryRepository;
use App\Repository\MessageRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * @ApiResource()
 * @Route("/api/nimportequoi")
 */
class RechercheController extends AbstractController
{
    /**
     * @Route("/recherche/{recherche}", name="recherche")
     */
    public function index(SerializerInterface $serializer, MessageRepository $messageRepository, string $recherche): Response
    {
        $messages = $serializer->serialize($messageRepository->search($recherche), 'json', ['groups' => 'listmessage']);

        return new Response($messages);
    }
}
