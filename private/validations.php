<?php

/**
 *  Validates value is present
 *
 * @param string/int $value
 * @return boolean
 */
function is_blank($value)
{
    return !isset($value) || trim($value) === '';
}

/**
 *  Validates value is present
 *
 * @param string/int $value
 * @return boolean
 */
function required($value)
{
    return !is_blank($value);
}

/**
 *  Validates string length is greater
 *
 * @param string $value
 * @param int $min
 * @return boolean
 */
function string_greater_than($value, $min)
{
    $length = strlen($value);
    return $length > $min;
}

/**
 *  Validates string lenght is less than
 *  the given length
 *
 * @param string $value
 * @param int $max
 * @return boolean
 */
function string_less_than($value, $max)
{
    $length = strlen($value);
    return $length < $max;
}

/**
 *  Validates string length is equal to 
 *  the given length
 *
 * @param string $value
 * @param int $exact
 * @return boolean
 */
function string_length_equal($value, $exact)
{
    $length = strlen($value);
    return $length == $exact;
}

/**
 *  Validates string length ('abc', $options['min' => 6, 'max' => 12])
 *
 * @param string $value
 * @param array $options
 * @return boolean
 */
function string_length($value, $options)
{
    if (isset($options['min']) && !string_greater_than($value, $options['min'] - 1)) {
        return false;
    } elseif (isset($options['max']) && !string_less_than($value, $options['max'] + 1)) {
        return false;
    } elseif (isset($options['exact']) && !string_length_equal($value, $options['exact'])) {
        return false;
    } else {
        return true;
    }
}
