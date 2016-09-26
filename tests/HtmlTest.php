<?php

class HtmlTest extends PHPUnit_Framework_TestCase
{

    public function setup()
    {

        $this->sample_text = 'Lorem ipsum dolor sit amet, http://test1.com adipisicing elit, sed do eiusmod
        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim email@domain.com,
        quis nostrud exercitation ullamco laboris nisi ut www.test2.com ex ea commodo
        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
        cillum dolore eu fugiat nulla pariatur. Excepteur sint http://www.test3.com cupidatat non
        proident, sunt in culpa qui officia deserunt test4.com anim id est email2@domain.com.';
    }

    public function test_linkify()
    {

        $parsed_text = 'Lorem ipsum dolor sit amet, <a href="http://test1.com">http://test1.com</a> adipisicing elit, sed do eiusmod
        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim <a href="mailto:email@domain.com">email@domain.com</a>,
        quis nostrud exercitation ullamco laboris nisi ut www.test2.com ex ea commodo
        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
        cillum dolore eu fugiat nulla pariatur. Excepteur sint <a href="http://www.test3.com">http://www.test3.com</a> cupidatat non
        proident, sunt in culpa qui officia deserunt test4.com anim id est <a href="mailto:email2@domain.com">email2@domain.com</a>.';

        $this->assertSame(
            $parsed_text,
            \markroland\StringParser\Html::Linkify($this->sample_text)
        );
    }

    public function test_Add_Url_Hyperlinks()
    {

        $parsed_text = 'Lorem ipsum dolor sit amet, <a href="http://test1.com">http://test1.com</a> adipisicing elit, sed do eiusmod
        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim email@domain.com,
        quis nostrud exercitation ullamco laboris nisi ut www.test2.com ex ea commodo
        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
        cillum dolore eu fugiat nulla pariatur. Excepteur sint <a href="http://www.test3.com">http://www.test3.com</a> cupidatat non
        proident, sunt in culpa qui officia deserunt test4.com anim id est email2@domain.com.';

        // Use reflection class to test private method
        $reflectionMethod = new \ReflectionMethod('\markroland\StringParser\Html', 'Add_Url_Hyperlinks');
        $reflectionMethod->setAccessible(true);

        $this->assertSame(
            $parsed_text,
            $reflectionMethod->invokeArgs(
                new \markroland\StringParser\Html,
                [$this->sample_text]
            )
        );
    }

    public function test_Add_Email_Hyperlinks()
    {

        $parsed_text = 'Lorem ipsum dolor sit amet, http://test1.com adipisicing elit, sed do eiusmod
        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim <a href="mailto:email@domain.com">email@domain.com</a>,
        quis nostrud exercitation ullamco laboris nisi ut www.test2.com ex ea commodo
        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
        cillum dolore eu fugiat nulla pariatur. Excepteur sint http://www.test3.com cupidatat non
        proident, sunt in culpa qui officia deserunt test4.com anim id est <a href="mailto:email2@domain.com">email2@domain.com</a>.';

        // Use reflection class to test private method
        $reflectionMethod = new \ReflectionMethod('\markroland\StringParser\Html', 'Add_Email_Hyperlinks');
        $reflectionMethod->setAccessible(true);

        $this->assertSame(
            $parsed_text,
            $reflectionMethod->invokeArgs(
                new \markroland\StringParser\Html,
                [$this->sample_text]
            )
        );
    }
}
