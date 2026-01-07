<?php

class Medication
{
    private int $id;
    private string $name;
    private string $instructions;

    public function __construct(string $name, string $instructions)
    {
        $this->name = $name;
        $this->instructions = $instructions;
    }



    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getInstructions(): string
    {
        return $this->instructions;
    }
}
