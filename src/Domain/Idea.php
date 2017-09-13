<?php

namespace Smartee\Domain;

class Idea
{
    /** @var string */
    private $title;

    /** @var string */
    private $description;

    public function __construct(string $title, string $description)
    {
        $this->title = $title;
        $this->description = $description;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getTitle(): string
    {
        return $this->title;
    }
}