<?php

declare(strict_types=1);

namespace Psl\Math;

use Psl;

/**
 * Returns the largest element of the given iterable, or null if the
 * iterable is empty.
 *
 * The value for comparision is determined by the given function in the case of
 * duplicate numeric keys, later values overwrite the previous ones.
 *
 * @psalm-template T
 *
 * @psalm-param iterable<T> $values
 * @psalm-param (callable(T): numeric) $num_func
 *
 * @psalm-return null|T
 */
function max_by(iterable $values, callable $num_func)
{
    $max = null;
    $max_num = null;
    foreach ($values as $value) {
        $value_num = $num_func($value);
        Psl\invariant(\is_numeric($value_num), 'Expected $num_func to return a numeric value, %s returned.', \gettype($value_num));
        if (null === $max_num || $value_num >= $max_num) {
            $max = $value;
            $max_num = $value_num;
        }
    }

    return $max;
}
