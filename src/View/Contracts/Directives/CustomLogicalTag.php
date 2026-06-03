<?php
declare(strict_types=1);

namespace M2Collective\PackageKit\View\Contracts\Directives;

interface CustomLogicalTag
{
    /**
     * @return string
     */
    public function logicalName() : string;

    /**
     * @param mixed $expression
     * @return string
     */
    public function logicalHandler(mixed $expression) : string;
}
