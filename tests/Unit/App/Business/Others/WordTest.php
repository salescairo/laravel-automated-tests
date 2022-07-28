<?php

namespace Tests\Unit\App\Business\Others;

use App\Business\Others\HappyNumber;
use App\Business\Others\Word;
use PHPUnit\Framework\TestCase;

class WordTest extends TestCase
{
    private function model():object
    {
        return new Word();
    }

    public function test_singular_letter_verification()
    {
        $this->assertEquals($this->model()->isSingularLetter('z'),true);
    }
    public function test_plural_letter_verification()
    {
        $this->assertEquals($this->model()->isSingularLetter('M'),false);
    }

    public function test_lower_word_size_verification()
    {
        $this->assertEquals($this->model()->getWordSize('2aba'),4);
    }
    public function test_upper_word_size_verification()
    {
        $this->assertEquals($this->model()->getWordSize('ADABE'),13);
    }
    

    public function test_word_size_coversion_is_happy_number()
    {
        $happyNumber = new HappyNumber();
        $this->assertEquals($happyNumber->isHappyNumber($this->model()->getWordSize('DAb')),true);
    }

    public function test_word_size_coversion_is_not_happy_number()
    {
        $this->assertEquals($this->model()->getWordPrimeNumbers('aacb bbba eb'),[true,true,true]);
    }
    
    public function test_word_size_coversion_is_prime_number()
    {
        $this->assertEquals($this->model()->getWordPrimeNumbers('aacb bbba eb'),[true,true,true]);
    }

    public function test_word_size_coversion_is_three_or_five_multiple()
    {
        $this->assertEquals($this->model()->getWordThirdOrFiveMultiples('jjj eee je ja'),[true,true,true,false]);
    }
    

}
