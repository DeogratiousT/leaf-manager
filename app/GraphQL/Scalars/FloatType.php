<?php

namespace App\GraphQL\Scalars;

use GraphQL\Type\Definition\ScalarType;
use GraphQL\Utils\Utils;
use GraphQL\Language\AST\FloatValueNode;
use GraphQL\Error\Error;
use GraphQL\Error\InvariantViolation;

/**
 * Read more about scalars here http://webonyx.github.io/graphql-php/type-system/scalar-types/
 */
class FloatType extends ScalarType
{
    public $name = 'Email';
    /**
     * Serializes an internal value to include in a response.
     *
     * @param  mixed  $value
     * @return mixed
     */
    public function serialize($value)
    {
        // Assuming the internal representation of the value is always correct
        return $value;

        // TODO validate if it might be incorrect
    }

    /**
     * Parses an externally provided value (query variable) to use as an input
     *
     * @param  mixed  $value
     * @return mixed
     */
    public function parseValue($value)
    {
        // TODO implement validation
        if (!filter_var($value, FILTER_VALIDATE_FLOAT)) {
            throw new Error("Cannot represent following value as float: " . Utils::printSafeJson($value));
        }

        return $value;
    }

    /**
     * Parses an externally provided literal value (hardcoded in GraphQL query) to use as an input.
     *
     * E.g.
     * {
     *   user(email: "user@example.com")
     * }
     *
     * @param  \GraphQL\Language\AST\Node  $valueNode
     * @param  mixed[]|null  $variables
     * @return mixed
     */
    public function parseLiteral($valueNode, ?array $variables = null)
    {
        // TODO implement validation
        if (!$valueNode instanceof FloatValueNode) {
            throw new Error('Query error: Can only parse floats got: ' . $valueNode->kind, [$valueNode]);
        }
        if (!filter_var($valueNode->value, FILTER_VALIDATE_FLOAT)) {
            throw new Error("Not a valid FLOAT", [$valueNode]);
        }

        return $valueNode->value;
    }
}
