<?php

/**
 * @see       https://github.com/laminas/laminas-hydrator for the canonical source repository
 * @copyright https://github.com/laminas/laminas-hydrator/blob/master/COPYRIGHT.md
 * @license   https://github.com/laminas/laminas-hydrator/blob/master/LICENSE.md New BSD License
 */

declare(strict_types=1);

namespace Laminas\Hydrator\Filter;

interface FilterInterface
{
    /**
     * Should return true, if the given filter does not match
     *
     * @param string $property The name of the property
     */
    public function filter(string $property) : bool;
}
