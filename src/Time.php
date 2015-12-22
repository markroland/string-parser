<?php

/**
 * TimeAgo
 *
 * PHP version 5
 *
 * @category  TimeAgo
 * @package   TimeAgo
 * @author    Mark Roland <mark@not-a-real-domain.com>
 * @copyright 2015 Mark Roland
 * @license   https://opensource.org/licenses/MIT MIT
 * @link      https://github.com/markroland/parser
 **/

namespace MarkRoland\StringParser;

/**
 * TimeAgo Class
 *
 * @category  TimeAgo
 * @package   TimeAgo
 * @author    Mark Roland <mark@not-a-real-domain.com>
 * @copyright 2015 Mark Roland
 * @license   https://opensource.org/licenses/MIT MIT
 * @version   Release: @package_version@
 * @link      https://github.com/markroland/parser
 **/
class Time
{

    /**
     * Validate input is a timestamp
     * Source: http://stackoverflow.com/a/2524761
     * @param int $timestamp An integer representation of a Unix-style timestamp
     * @return boolean
     **/
    static private function isValidTimeStamp($timestamp)
    {
        return ((int) $timestamp === $timestamp)
            && ($timestamp <= PHP_INT_MAX)
            && ($timestamp >= ~PHP_INT_MAX);
    }

    /**
     * Convert date to relative time
     * @param string $input Input String
     * @return string Replacement result.
     **/
    static public function Ago($input, $type = 'timestamp')
    {

        // Initialization
        $result = '';
        $timestamp = $input;

        // // Test input is in correct format
        if($type == 'timestamp' && !self::isValidTimeStamp($input)){
            throw new \Exception('Input must be a UNIX-style timestamp');
        }

        // Set current time
        $now = time();

        // Calculate difference between current time and input time
        $seconds_ago = $now - $timestamp;

        // Set a default unit and value
        $val = $seconds_ago;
        $unit = 'second';

        // Convert the seconds-difference to a relative time
        if($seconds_ago > 31556926){
            $val = floor($seconds_ago / 31556926);
            $unit = 'year';
        }
        elseif($seconds_ago >= 2592000){
            $val = floor($seconds_ago / 2592000);
            $unit = 'month';
        }
        elseif($seconds_ago >= 604800){
            $val = floor($seconds_ago / 604800);
            $unit = 'week';
        }
        elseif($seconds_ago >= 86400){
            $val = floor($seconds_ago / 86400);
            $unit = 'day';
        }
        elseif($seconds_ago >= 3600){
            $val = floor($seconds_ago / 3600);
            $unit = 'hour';
        }
        elseif($seconds_ago >= 60){
            $val = floor($seconds_ago / 60);
            $unit = 'minute';
        }

        return $val . " " . $unit . (($val > 1 || $val == 0) ? "s" : "") . " ago";
    }
}
