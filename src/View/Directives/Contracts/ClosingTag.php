<?php
declare(strict_types=1);

namespace M2Collective\PackageKit\View\Directives\Contracts;

use M2Collective\PackageKit\View\Directives\Directive;

interface ClosingTag extends Directive
{
    /**
     * @return string
     */
    public function closingName() : string;

    /**
     * @param mixed $expression
     * @return string
     */
    public function closingHandler(mixed $expression) : string;
}
