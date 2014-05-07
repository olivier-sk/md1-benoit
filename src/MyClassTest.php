<?php

//require_once 'vendor\autoload.php' ;
use testPhpUnit\Person;
use testPhpUnit\Address;
use helpers\Colors;

class MyClassTest extends \PHPUnit_Framework_TestCase
{

    // -----------------------------------------------
    // __construct ()
    // -----------------------------------------------
    private $colors = false;
    public function __construct($name = null, array $data = array(), $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->colors = new Colors();
        $testPSR0Underscore = new testPhpUnit_testPSR0Underscore ();
    }

    // -----------------------------------------------
    // Helpers
    // -----------------------------------------------
    private function getMessage ($message) {
        if ($this->colors) {
            return $this->colors->getColoredString($message, "yellow", null);
        } else {
            return $message;
        }
    }

    // -----------------------------------------------
    // Data providers
    // -----------------------------------------------
    /**
     * @dataProvider additionProvider
     */
    public function testAdd($a, $b, $expected)
    {
        $message = $this->getMessage(">>> " . $a . ' + ' .  $b . ' != ' . $expected) ;
        $this->assertEquals($expected, $a + $b, $message);
    }

    public function additionProvider()
    {
        return array(
            array(0, 0, 0),
            array(0, 1, 1),
            array(1, 0, 1),
//            array(1, 1, 3)
        );
    }


    // -----------------------------------------------
    // Data providers 2
    // -----------------------------------------------
    /**
     * @dataProvider lettersProvider
     */
    public function testLetters($letter)
    {
        $message = ">>> The letter is 'c'" ;
        if ($letter === 'c'):
            if ($this->colors) {
                $this->fail($this->colors->getColoredString($message, "yellow", null));
            } else {
                $this->fail($message);
            };
        endif;
    }

    public function lettersProvider()
    {
        return array(
            ['a'],
            ['b'],
//            ['c'],
            ['d'],
            ['e']
        );
    }


    // -----------------------------------------------
    // Mock
    // -----------------------------------------------
    public function testPersonsAddress ()
    {
        $failedTest = false;
        $address = '8 avenue Garennière' ;
        $addressMock = $failedTest
            ? $this->getMock('testPhpUnit\Address', [], [$address . 'BOUH' , 94260, 'fresnes'])
            : $this->getMock('testPhpUnit\Address', [], [$address, 94260, 'fresnes']) ;
        $message = $this->getMessage(">>> " . $address . ' != ' . $addressMock->address) ;
        $this->assertEquals($address, $addressMock->address, $message);
    }

    // -----------------------------------------------
    // Assertions
    // -----------------------------------------------
    public function testTrueIsTrue()
    {
        $failedTest = !false;
        $varToTest = $failedTest;
        $message = $this->getMessage(">>> True is not true") ;
        $this->assertTrue($varToTest, $message);
    }
    public function testPersonNameIsNotEmpty()
    {
        $failedTest = false;
        $person = $failedTest ? new Person('', '', ['','','']) : new Person('Marcel', 'Lupin', ['8 avenue Garennière',94260,'fresnes']);
        $message = $this->getMessage(">>> The person's name is empty") ;
        $this->assertNotEmpty($person->name, $message);
    }
    public function testPersonNameDoesntContainNumbers()
    {
        $failedTest = false;
        $person = $failedTest ? new Person('Marc777el', 'Lupin', ['8 avenue Garennière',94260,'fresnes']) : new Person('Marcel', 'Lupin', ['8 avenue Garennière',94260,'fresnes']);
        if (preg_match('~[0-9]+~', $person->name)) {
            $message = $this->getMessage(">>> Name contains numbers") ;
            $this->fail($message);
        }
    }

    // -----------------------------------------------
    // Expects exception
    // -----------------------------------------------
    /**
     * @expectedException Exception
     */
    // @expectedException PHPUnit_Framework_AssertionFailedError
    public function testAnnotations()
    {
        $failedTest = !true;
        if ($failedTest) {
            return true;
        } else {
            throw new \Exception;
            // throw new PHPUnit_Framework_AssertionFailedError ('Exeption was thrown') ;
        }
    }

    // -----------------------------------------------
    // fail
    // -----------------------------------------------
    public function testIsValidEmail()
    {
        $failedTest = false;
        $email = $failedTest ? "someone@exa mple.com" : "someone@example.com";
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $message = $this->getMessage(">>> E-mail is not valid");
            $this->fail($message);
        }
    }
    public function testPersonHasAnAdress ()
    {
        $failedTest = false;
        $person = $failedTest ? new Person('Marcel', 'Lupin', ['','','']) : new Person('Marcel', 'Lupin', ['8 avenue Garennière',94260,'fresnes']);
        if (!$person->address instanceof Address) {
            $message = $this->getMessage(">>> The address is not an instance of 'Address'");
            $this->fail($message);
        }
    }



}
