<?php

namespace Smartee\Application\Controller;

use Smartee\Domain\Idea;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\Serializer;

class IdeaController
{
    public function get(Serializer $serializer)
    {
        $idea = new Idea('title', 'description');
        return new JsonResponse($serializer->serialize($idea, 'json'), 200, [], true);
    }

    public function post(Request $request, Serializer $serializer)
    {
        $idea = $serializer->deserialize($request->getContent(), Idea::class, 'json');
        return new JsonResponse($serializer->serialize($idea, 'json'), 200, [], true);
    }
}