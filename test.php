<?php
\PMVC\Load::plug();
\PMVC\addPlugInFolders([__DIR__.'/../']);
class SimpleDiffTest extends PHPUnit_Framework_TestCase
{
    function testPlugin()
    {
        ob_start();
        $plug = 'simple_diff';
        print_r(PMVC\plug($plug));
        $output = ob_get_contents();
        ob_end_clean();
        $this->assertContains($plug,$output);
    }

    function testDiff()
    {
        $a = 'tw.yahoo.com';
        $b = 'google.com';
        $result = PMVC\plug('simple_diff')->diff($a,$b);
        $this->assertEquals('.com',$result[2]);
    }
}
