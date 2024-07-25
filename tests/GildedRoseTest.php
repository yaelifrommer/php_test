<?php

declare(strict_types=1);

namespace Tests;

//This test file has been converted to the Approval style to maintain a consistent testing approach.

use ApprovalTests\Approvals;
use PHPUnit\Framework\TestCase;

/*
* Executes the final test using the fixture texttest_fixture3.php.
* Captures all screen output and compares it to the expected output file.
* The expected output is in ApprovalTest.testFoo.approved.txt.
* In case of a mismatch, the actual output will be in the corresponding received file.
*/
class GildedRoseTest extends TestCase
{
    // The last test to run.
    public function testFoo(): void
    {
        ob_start();
        include(__DIR__ . '/../fixtures/texttest_fixture3.php');
        $output = ob_get_clean();
        Approvals::verifyString($output);
    }
}
