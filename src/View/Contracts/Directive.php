<?php
declare(strict_types=1);

namespace M2Collective\PackageKit\View\Contracts;

interface Directive
{
    /**
     * @return string
     */
    public function openingTag() : string;

    /**
     * @param mixed $expression
     * @return string
     */
    public function openingHandler(mixed $expression) : string;

    /**
     * @return string
     */
    public function closingTag() : string;

    /**
     * @param mixed $expression
     * @return string
     */
    public function closingHandler(mixed $expression) : string;

    /**
     * @return string
     */
    public function logicalTag() : string;

    /**
     * @param mixed $expression
     * @return string
     */
    public function logicalHandler(mixed $expression) : string;
}
