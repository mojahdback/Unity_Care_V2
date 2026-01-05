<?php
class Medication
{
    protected ?int $id;
    protected string $name;
    protected string $instructions;

    public function __construct(string $name, string $instructions, ?int $id = null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->instructions = $instructions;
    }

    public function getId(): ?int { return $this->id; }
    public function getName(): string { return $this->name; }
    public function setName(string $n): void { $this->name = $n; }

    public function getInstructions(): string { return $this->instructions; }
    public function setInstructions(string $i): void { $this->instructions = $i; }
}
