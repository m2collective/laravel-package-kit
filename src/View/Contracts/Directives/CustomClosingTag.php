<?php
declare(strict_types=1);

namespace M2Collective\PackageKit\View\Contracts\Directives;

interface CustomClosingTag
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
