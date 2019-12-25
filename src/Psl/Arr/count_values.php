<?php

declare(strict_types=1);

namespace Psl\Arr;

use Psl;
use Psl\Iter;
use Psl\Str;

/**
 * Returns a new array mapping each value to the number of times it appears
 * in the given iterable.
 *
 * @psalm-template Tv as array-key
 *
 * @psalm-param iterable<Tv> $values
 *
 * @psalm-return array<Tv|Tv, int>
 * @return int[]
 */
function count_values(iterable $values): array
{
    /** @psalm-var array<int, Tv> $values */
    $values = Iter\to_array($values);
    /** @psalm-var array<Tv, int> $result */
    $result = [];

    /** @psalm-var Tv $value */
    foreach ($values as $value) {
        Psl\invariant(
            Str\is_string($value) || is_numeric($value),
            'Expected all values to be of type array-key, value of type (%s) provided.',
            gettype($value)
        );

        /** @psalm-var int */
        $count = idx($result, $value, 0);
        $result[$value] = $count + 1;
    }

    return $result;
}
