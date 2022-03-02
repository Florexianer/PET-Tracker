<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use Oscorp\Pet\Model\Owner;

use PHPUnit\Framework\TestCase;

final class OwnerTest extends TestCase
{

    public function testCanRecognizeValidPhoneNUmber(): void
    {
        //$this->assertFalse(Owner::isValidPhoneNumber("thiswillfail"));

        $this->assertEquals(false,
            Owner::isValidPhoneNumber("thiswillfail")
        );
        $this->assertEquals(true,
            Owner::isValidPhoneNumber("+43 11 22 333")
        );

    }
}