<?php

declare(strict_types=1);

namespace Lei\SyliusSupplierPlugin;

use Sylius\Bundle\CoreBundle\Application\SyliusPluginTrait;
use Symfony\Component\HttpKernel\Bundle\Bundle;
use Symfony\Component\DependencyInjection\Extension\ExtensionInterface;
use Lei\SyliusSupplierPlugin\DependencyInjection\SyliusSupplierPluginExtension;

final class SyliusSupplierPlugin extends Bundle
{
    use SyliusPluginTrait;

    private ?ExtensionInterface $extensionInstance = null;

    public function getContainerExtension(): ?ExtensionInterface
    {
        if ($this->extensionInstance === null) {
            $this->extensionInstance = new SyliusSupplierPluginExtension();
        }

        return $this->extensionInstance;
    }
}
