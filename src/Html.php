<?php

/**
 * Html
 *
 * PHP version 5
 *
 * @category  Html
 * @package   Html
 * @author    Mark Roland
 * @copyright 2015 Mark Roland
 * @license   https://opensource.org/licenses/MIT MIT
 * @link      https://github.com/markroland/string-parser
 **/

namespace MarkRoland\StringParser;

/**
 * Html Class
 *
 * @category  Html
 * @package   Html
 * @author    Mark Roland
 * @copyright 2015 Mark Roland
 * @license   https://opensource.org/licenses/MIT MIT
 * @version   Release: @package_version@
 * @link      https://github.com/markroland/string-parser
 **/
class Html
{

    /**
     * Linkify String
     *
     * @param string $input Input String
     *
     * @return string Replacement result.
     **/
    public static function Linkify($input)
    {

        // Set the default output to be the same as the input
        $output = $input;

        // Replace text URL with hyperlinked URL
        $output = self::Add_Url_Hyperlinks($output);

        // Replace email address
        $output = self::Add_Email_Hyperlinks($output);

        return $output;
    }

    /**
     * Replace URL(s) in text with hyperlinked URL(s)
     *
     * @param string $input Input String
     *
     * @return string Hyperlinked text
     **/
    private static function Add_Url_Hyperlinks($input)
    {

        $replaced_text = preg_replace(
            "/([a-zA-Z]+:\/\/[a-z0-9\_\.\-]+[a-z]{2,6}[a-zA-Z0-9\/\*\-\_\?\&\%\=\,\+\.]+)/",
            '<a href="$1">$1</a>',
            $input
        );

        return $replaced_text;
    }

    /**
     * Replaced Email address(es) in text with hyperlinked Email Address(es)
     *
     * @param string $input Input String
     *
     * @return string Hyperlinked text
     **/
    private static function Add_Email_Hyperlinks($input)
    {
        return preg_replace(
            "/([\s|\,\>])([a-zA-Z][a-zA-Z0-9\_\.\-]*[a-zA-Z]*\@[a-zA-Z][a-zA-Z0-9\_\.\-]*[a-zA-Z]{2,6})([A-Za-z0-9\!\?\@\#\$\%\^\&\*\(\)\_\-\=\+]*)([\s|\.|\,\<])/i",
            "$1<a href=\"mailto:$2\">$2</a>$4",
            $input
        );
    }
}
