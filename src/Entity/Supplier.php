<?php

declare(strict_types=1);

namespace Lei\SyliusSupplierPlugin\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: \Sylius\Bundle\ResourceBundle\Doctrine\ORM\EntityRepository::class)]
#[ORM\Table(name: 'sylius_supplier_plugin_supplier')]
class Supplier implements SupplierInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(type: 'string')]
    private ?string $name = null;

    #[ORM\Column(type: 'string')]
    private ?string $description = null;

    #[ORM\Column(type: 'boolean')]
    private ?bool $enabled = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    public function getEnabled(): ?bool
    {
        return $this->enabled;
    }

    public function setEnabled(?bool $enabled): void
    {
        $this->enabled = $enabled;
    }

    public function __toString(): string
    {
        return (string) $this->getName();
    }
}
