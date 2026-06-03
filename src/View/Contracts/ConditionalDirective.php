<?php
declare(strict_types=1);

namespace M2Collective\PackageKit\View\Contracts;

use M2Collective\PackageKit\View\Contracts\Directives\CustomClosingTag;
use M2Collective\PackageKit\View\Contracts\Directives\CustomLogicalTag;
use M2Collective\PackageKit\View\Contracts\Directives\CustomOpeningTag;

interface ConditionalDirective extends BaseDirective, CustomClosingTag, CustomOpeningTag, CustomLogicalTag
{

}
