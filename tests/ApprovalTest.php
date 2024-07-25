<?php

declare(strict_types=1);

namespace Tests;

/**
 * This unit test uses [ApprovalTests PHP](https://github.com/approvals/ApprovalTests.php).
 *
 * There are two test cases here with different styles:
 * <li>"foo" was more similar to the unit test from the 'Java' version
 * <li>"thirtyDays" was more similar to the TextTest from the 'Java' version
 *
 * The "foo" test has been updated to follow the same style and format as the "thirtyDays" test.
 * Both tests now use the Approval Tests library to compare the actual output with the expected output.
 *
 * Each test case includes a fixture file that creates objects, calls methods, and prints the results.
 * The output is then captured and compared against a pre-written expected output file.
 */

use ApprovalTests\Approvals;
use PHPUnit\Framework\TestCase;

class ApprovalTest extends TestCase
{
    /*
     * Executes the first test using the fixture texttest_fixure2.php.
     * The expected output is in ApprovalTest.testFoo.approved.txt.
     * In case of a mismatch, the actual output will be in the corresponding received file.
    */
    public function testFoo(): void
    {
        ob_start();
        include(__DIR__ . '/../fixtures/texttest_fixure2.php');
        $output = ob_get_clean();
        Approvals::verifyString($output);
    }

    /*
    * Executes the second test using the fixture texttest_fixture.php.
    * Captures all screen output and compares it to the expected output file.
    * The expected output is in ApprovalTest.testThirtyDays.approved.txt.
    * In case of a mismatch, the actual output will be in the corresponding received file.
    */
    public function testThirtyDays(): void
    {
        ob_start();
        $argv = ['', '30'];
        include(__DIR__ . '/../fixtures/texttest_fixture.php');
        $output = ob_get_clean();
        Approvals::verifyString($output);
    }
}
