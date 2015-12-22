<?php

/**
 * Html
 *
 * PHP version 5
 *
 * @category  Html
 * @package   Html
 * @author    Mark Roland <mark@not-a-real-domain.com>
 * @copyright 2015 Mark Roland
 * @license   https://opensource.org/licenses/MIT MIT
 * @link      https://github.com/markroland/composer-boilerplate
 **/

namespace MarkRoland\StringParser;

/**
 * Html Class
 *
 * @category  Html
 * @package   Html
 * @author    Mark Roland <mark@not-a-real-domain.com>
 * @copyright 2015 Mark Roland
 * @license   https://opensource.org/licenses/MIT MIT
 * @version   Release: @package_version@
 * @link      https://github.com/markroland/composer-boilerplate
 **/
class Html
{

    /**
     * Linkify String
     * @param string $input Input String
     * @return string Replacement result.
     **/
    public static function Linkify($input)
    {

        // Set the default output to be the same as the input
        $output = $input;

        // Replace ?
        $output = self::LinkReplacementOne($output);

        // Replace ?
        $output = self::LinkReplacementTwo($output);

        // Replace email address
        $output = self::ConvertEmail($output);

        return $output;
    }

    /**
     * Convert Email
     * @param string $input Input String
     * @return string Replace result
     **/
    private function LinkReplacementOne($input)
    {
        return preg_replace(
            "/([a-zA-Z]+:\/\/[a-z0-9\_\.\-]+" . "[a-z]{2,6}[a-zA-Z0-9\/\*\-\_\?\&\%\=\,\+\.]+)/",
            '<a href="$1" target="_blank">$1</a>',
            $input
        );
    }

    /**
     * Convert Email
     * @param string $input Input String
     * @return string Replace result
     **/
    private function LinkReplacementTwo($input)
    {
        return preg_replace(
            "/[^a-z]+[^:\/\/](www\." . "[^\.]+[\w][\.|\/][a-zA-Z0-9\/\*\-\_\?\&\%\=\,\+\.]+)/",
            '<a href="$1">$1</a>',
            $input
        );
    }

    /**
     * Convert Email
     * @param string $input Input String
     * @return string Replace result
     **/
    private function ConvertEmail($input)
    {
        return preg_replace(
            "/([\s|\,\>])([a-zA-Z][a-zA-Z0-9\_\.\-]*[a-z" . "A-Z]*\@[a-zA-Z][a-zA-Z0-9\_\.\-]*[a-zA-Z]{2,6})" . "([A-Za-z0-9\!\?\@\#\$\%\^\&\*\(\)\_\-\=\+]*)" . "([\s|\.|\,\<])/i",
            "$1<a href=\"mailto:$2$3$4\">$2</a>$4",
            $input
        );
    }
}
