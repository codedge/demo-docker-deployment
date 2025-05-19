<?php

namespace App\Entity;

use App\Repository\ElephantRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ElephantRepository::class)]
class Elephant
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    private int $amountEars = 0;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAmountEars(): int {
        return $this->amountEars;
    }

    public function setAmountEars(int $amountEars): Elephant {
        $this->amountEars = $amountEars;

        return $this;
    }
}
