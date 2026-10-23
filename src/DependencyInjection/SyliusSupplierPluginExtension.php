<?php

declare(strict_types=1);

namespace Lei\SyliusSupplierPlugin\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Extension\PrependExtensionInterface;
use Symfony\Component\DependencyInjection\Loader\PhpFileLoader;

final class SyliusSupplierPluginExtension extends Extension implements PrependExtensionInterface
{
    public function prepend(ContainerBuilder $container): void
    {
        // Force Doctrine to use PHP 8 attributes for this plugin's entities
        $container->prependExtensionConfig('doctrine', [
            'orm' => [
                'mappings' => [
                    'LeiSyliusSupplierPlugin' => [
                        'is_bundle' => false,
                        'type' => 'attribute',
                        // We rely on the project dir as this plugin is installed in a plugins directory
                        'dir' => '%kernel.project_dir%/plugins/SupplierPlugin/src/Entity',
                        'prefix' => 'Lei\\SyliusSupplierPlugin\\Entity',
                        'alias' => 'LeiSyliusSupplierPlugin',
                    ],
                ],
            ],
        ]);
    }

    public function load(array $configs, ContainerBuilder $container): void
    {
        $loader = new PhpFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config'));
    }

    public function getAlias(): string
    {
        // Match the root node used in the Configuration class for clarity
        return 'sylius_supplier_plugin';
    }
}
