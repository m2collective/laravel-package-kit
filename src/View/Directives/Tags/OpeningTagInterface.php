<?php
declare(strict_types=1);

namespace M2Collective\PackageKit\View\Directives\Tags;

interface OpeningTagInterface
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
