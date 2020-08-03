<?php

declare(strict_types=1);

namespace Psl\Type;

/**
 * @template Tl
 * @template Tr
 *
 * @psalm-param Type<Tl> $left_type_spec
 * @psalm-param Type<Tr> $right_type_spec
 *
 * @psalm-return Type<Tl&Tr>
 */
function intersection(
    Type $left_type_spec,
    Type $right_type_spec
): Type {
    /** @psalm-var Type<Tl&Tr> */
    return new Internal\IntersectionType($left_type_spec, $right_type_spec);
}
