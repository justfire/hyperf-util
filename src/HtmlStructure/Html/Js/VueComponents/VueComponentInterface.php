<?php

namespace Justfire\Util\HtmlStructure\Html\Js\VueComponents;

/**
 * Interface VueComponentInterface
 */
interface VueComponentInterface
{
    public function getName():string;

    public function register(string $registerVar);
}