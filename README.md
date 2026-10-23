<p align="center">
    <a href="https://sylius.com" target="_blank">
        <img src="https://demo.sylius.com/assets/shop/img/logo.png" />
    </a>
</p>

<h1 align="center">Sylius Supplier Plugin</h1>

Demo by [Sylius PluginSkeleton v1.3.0](https://github.com/Sylius/PluginSkeleton)

<p align="center">
    <a target="_blank" rel="noopener noreferrer" href="screenshot.png">
        <img src="screenshot.png" alt="Screenshot" style="max-width:100%;">
    </a>
</p>

### Install (Symfony 6.4 / Sylius 2.x)

- Require the package:

```bash
composer require e3-lei/sylius-supplier-plugin
```

- Enable the bundle (if not auto-enabled) by adding to `config/bundles.php`:

```php
return [
    // ...
    Lei\SyliusSupplierPlugin\SyliusSupplierPlugin::class => ['all' => true],
];
```

- Import the plugin’s admin routes (in `config/routes/sylius_supplier_plugin_admin.yaml`):

```yaml
sylius_supplier_plugin_admin:
  resource: "@SyliusSupplierPlugin/Resources/config/admin_routing.yml"
```
Import the plugin’s grid configuration if you want the default Admin grid (in `config/packages/sylius_grid.yaml` or a dedicated file):

```yaml
imports:
  - { resource: '@SyliusSupplierPlugin/Resources/config/grids/grids.yml' }
```

- Run migrations as usual (create your own migration after installing the plugin):

```bash
php bin/console doctrine:migrations:diff
php bin/console doctrine:migrations:migrate
```

- Clear cache:

```bash
php bin/console cache:clear
```