<?php
declare(strict_types=1);

namespace M2Collective\PackageKit\Support\Providers\Concerns;

use Illuminate\Support\Facades\Blade;

trait RegisterComponentNamespaces
{
    /**
     * @param array $components
     * @param bool $registering
     * @return void
     */
    private function registerComponentNamespaces(array $components, bool $registering = true): void
    {
        if($components !== [] && $registering) {
            foreach ($components as $namespace => $prefix) {
                $this->registerComponentNamespace($namespace, $prefix);
            }
        }
    }

    /**
     * @param string $namespace
     * @param string $prefix
     * @return void
     */
    private function registerComponentNamespace(string $namespace, string $prefix): void
    {
        Blade::componentNamespace($namespace, $prefix);
    }
}
