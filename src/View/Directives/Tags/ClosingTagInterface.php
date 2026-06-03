<?php
declare(strict_types=1);

namespace M2Collective\PackageKit\View\Directives\Tags;

interface ClosingTagInterface
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
