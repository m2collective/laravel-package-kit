<?php
declare(strict_types=1);

namespace M2Collective\PackageKit\View\Concerns;

trait PathToRenders
{
    /**
     * @param array $paths
     * @param string $separator
     * @param string|null $namespace
     * @return string
     */
    protected function pathToRenders(array $paths, string $separator = '.', ?string $namespace = null): string
    {
        if($namespace !== null) {
            return $namespace.'::'.implode($separator, $paths);
        } else {
            return implode($separator, $paths);
        }
    }
}
