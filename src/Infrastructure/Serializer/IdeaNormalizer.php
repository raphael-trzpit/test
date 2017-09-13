<?php

namespace Smartee\Infrastructure\Serializer;

use Smartee\Domain\Idea;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class IdeaNormalizer implements NormalizerInterface, DenormalizerInterface
{
    public function normalize($object, $format = null, array $context = array())
    {
        return [
            'title' => $object->getTitle(),
            'description' => $object->getDescription(),
        ];
    }

    public function denormalize($data, $class, $format = null, array $context = array())
    {
        // Use validation to validate $data
        if (!isset($data['title'])) {
            throw new \InvalidArgumentException('need title field.');
        }
        if (!isset($data['description'])) {
            throw new \InvalidArgumentException('need description field.');
        }
        return new Idea($data['title'], $data['description']);
    }

    public function supportsDenormalization($data, $type, $format = null)
    {
        return $type === Idea::class;
    }

    public function supportsNormalization($data, $format = null)
    {
        return $data instanceof Idea;
    }
}