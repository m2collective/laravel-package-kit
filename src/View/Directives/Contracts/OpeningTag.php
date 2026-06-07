<?php
declare(strict_types=1);

namespace M2Collective\PackageKit\View\Directives\Contracts;

use M2Collective\PackageKit\View\Directives\Directive;

interface OpeningTag extends Directive
{
    /**
     * @return string
     */
    public function openingName() : string;

    /**
     * @param mixed $expression
     * @return string
     */
    public function openingHandler(mixed $expression) : string;
}
