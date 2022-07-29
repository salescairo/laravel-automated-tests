<?php

namespace Tests\Unit\App\Business\Others;

use App\Business\Others\HappyNumber;
use App\Business\Others\Word;
use PHPUnit\Framework\TestCase;

class WordTest extends TestCase
{
    public function test_singular_letter_verification()
    {
        $word = new Word();
        
        $isSingularLetter = $word->isSingularLetter('z');

        $this->assertTrue($isSingularLetter);
    }
    public function test_plural_letter_verification()
    {
        $word = new Word();
        
        $isSingularLetter = $word->isSingularLetter('M');

        $this->assertFalse($isSingularLetter);
    }

    public function test_lower_word_size_verification()
    {
        $word = new Word();
        
        $size = $word->getWordSize('2aba');

        $this->assertEquals(4,$size);
    }
    public function test_upper_word_size_verification()
    {
        $word = new Word();

        $size = $word->getWordSize('ADABE');

        $this->assertEquals(13,$size);
    }
    

    public function test_word_size_coversion_is_happy_number()
    {
        $word = new Word();
        $happyNumber = new HappyNumber();

        $wordSize = $word->getWordSize('DAb');
        $isHappyNumber = $happyNumber->isHappyNumber($wordSize);

        $this->assertTrue($isHappyNumber);
    }

    public function test_word_size_coversion_is_not_happy_number()
    {
        $word = new Word();

        $isHappyNumber = $word->getWordPrimeNumbers('aacb bbba eb');

        $this->assertEquals([true,true,true],$isHappyNumber);
    }
    
    public function test_word_size_coversion_is_prime_number()
    {
        $word = new Word();

        $isPrimeNumbers = $word->getWordPrimeNumbers('aacb bbba eb');

        $this->assertEquals([true,true,true],$isPrimeNumbers);
    }

    public function test_word_size_coversion_is_three_or_five_multiple()
    {
        $word = new Word();

        $threeOrFiveMultiple = $word->getWordThirdOrFiveMultiples('jjj eee je ja');

        $this->assertEquals([true,true,true,false],$threeOrFiveMultiple);
    }
    

}
