<?php
declare(strict_types=1);

namespace M2Collective\PackageKit\View\Contracts;

interface CustomOpeningTag
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
