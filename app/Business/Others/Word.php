<?php

namespace App\Business\Others;

class Word extends Number
{
    public array $singular = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z'];
    public array $plural =   ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'];


    public function getCollectionSize($words): int
    {
       return $this->getTotal($this->getWordSizeCollection($this->getCollection($words)));
    }

    public function getCollection($words):array
    {
        return explode(' ', $words);
    }

    public function getWordSizeCollection($words): array
    {
        $collection = [];
        foreach ($words as $key => $value) {
            $collection[] = $this->getWordSize($value);
        }
        return $collection;
    }

    public function getWordSize($word):int
    {
        $values  = [];
        foreach($this->getWordCollections($word) as $key => $value){
            $values[] = ($this->getValueLetter($value)+1);
        }
        return array_sum($values);
    }

    public function getWordCollections($word): array
    {
        $collection =  array_map('strval', str_split($word));
        return $this->clearCollection($collection);
    }
    
    public function clearCollection($collection):array
    {
        $newCollection = [];
        $words = array_merge($this->singular,$this->plural);
        foreach($collection as $key => $value){
            if(in_array($value,array_values($words))==true){
               $newCollection[]=$value;
            }
        }
        
        return $newCollection;
    }

    public function getValueLetter($letter): int
    {
        $collection = $this->getLetterCollection($letter);
        $search = array_search($letter, $collection);
        return $search;
    }

    public function getLetterCollection($letter): array
    {
        if ($letter === strtoupper($letter)) {
            return $this->plural;
        }
        return $this->singular;
    }

    public function isSingularLetter($letter): bool
    {
        if ($letter === strtoupper($letter)) {
            return false;
        }
        return true;
    }


    public function getWordPrimeNumbers($words): array
    {
        $sizes = [];
        $word = new Word();
        foreach ($word->getWordSizeCollection($word->getCollection($words)) as $key => $value) {
            $sizes[] =  ($this->isPrimeNumber($value)) ? true : false;
        }
        return $sizes;
    }

    public function getWordHappyNumbers($words): array
    {
        $sizes = [];
        $word = new Word();
        $happyNumber = new HappyNumber();
        foreach ($word->getWordSizeCollection($word->getCollection($words)) as $key => $value) {
            $sizes[] =  ($happyNumber->isHappyNumber($value)) ? true : false;
        }
        return $sizes;
    }
    
    public function getWordThirdOrFiveMultiples($words): array
    {
        $sizes = [];
        $word = new Word();
        $multiple = new Multiple();
        foreach ($word->getWordSizeCollection($word->getCollection($words)) as $key => $value) {
           $sizes[] =  ($multiple->isThreeOrFiveMultiple($value)) ? true :false;
        }
        return $sizes;
    }
}
