<?php

use Carbon\Carbon;
use Laravel\Cashier\Cashier;

if (!function_exists('carbon')) {
    function carbon($val = null)
    {
        return new Carbon($val);
    }
}

if (!function_exists('money')) {
    if (class_exists('\Laravel\Cashier\Cashier')) {
        function money($amount, $currency = null, $locale = null)
        {
            return Cashier::formatAmount(round($amount, 2) * 100, $currency, $locale);
        }
    }
}

if (!function_exists('user')) {
    function user()
    {
        return auth()->user();
    }
}

if (!function_exists('number_format_short')) {
    function number_format_short($n, $precision = 1)
    {
        if ($n < 900) {
            // 0 - 900
            $n_format = number_format($n, $precision);
            $suffix = '';
        } else if ($n < 900000) {
            // 0.9k-850k
            $n_format = number_format($n / 1000, $precision);
            $suffix = 'k';
        } else if ($n < 900000000) {
            // 0.9m-850m
            $n_format = number_format($n / 1000000, $precision);
            $suffix = 'm';
        } else if ($n < 900000000000) {
            // 0.9b-850b
            $n_format = number_format($n / 1000000000, $precision);
            $suffix = 'b';
        } else {
            // 0.9t+
            $n_format = number_format($n / 1000000000000, $precision);
            $suffix = 't';
        }
        // Remove unecessary zeroes after decimal. "1.0" -> "1"; "1.00" -> "1"
        // Intentionally does not affect partials, eg "1.50" -> "1.50"
        if ($precision > 0) {
            $dotzero = '.' . str_repeat('0', $precision);
            $n_format = str_replace($dotzero, '', $n_format);
        }
        return $n_format . $suffix;
    }
}
if (!function_exists('isJSON')) {
    function isJSON($string)
    {
        return is_string($string) && is_array(json_decode($string, true)) ? true : false;
    }
}
