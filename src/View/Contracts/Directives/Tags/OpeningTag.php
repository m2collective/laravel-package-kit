<?php
declare(strict_types=1);

namespace M2Collective\PackageKit\View\Contracts\Directives\Tags;

interface OpeningTag
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
