<?php

class Palindrome
{
    private $lenght, $string;
    /**
     * Check if the given string is palindrome
     * @param  string $value
     * @return bool
     */
    public function checkIfPalindrome($value): bool
    {
        
        if (strrev($value) == $value) {
            return true;
        }

        return false;
    }

    /**
     * Get the longest Palindrome substring
     * @param mix $value [description]
     * @return string
     */
    function getLongestPalindrome($value): string
    {
        $lenght = strlen($value);

        //return the value if the lenght is less than 2
        if ($lenght < 2) {
            return $value;
        }

        $this->lenght = $lenght;
        $this->string = $value;
        $left = 0;
        $right = 0;
        for ($x=0; $x<$lenght; ++$x) {
            //the point is determined length of palindromic
            $odd = $this->expand($x, $x);
             // the even diffusion center
            $even = $this->expand($x, $x+1);
            //get the max lenght
            $maxLen = max($odd, $even);
            if ($maxLen > $right-$left+1) {
                // get the new left and right values
                $right = $x + floor($maxLen/2);
                $left = $x - floor(($maxLen-1)/2);
            }
        }

        $palindrome = substr($value, $left, $right-$left+1);
        
        if ($this->checkIfPalindrome($palindrome)) {
            return $palindrome;
        }

        return $value;
    }

    /**
     * [expand description]
     * @param  [type] $left  [description]
     * @param  [type] $right [description]
     * @return [type]        [description]
     */
    private function expand(int $left, int $right)
    {
        while ($left>=0 && $right<$this->lenght && $this->string[$left] == $this->string[$right]) {
            $left--;
            $right++;
        }
        
        return $right-$left-1;
    }
}

$value = 'abcdcba';

$palindrome = new Palindrome();

echo ' <br /> ------- CHECKING IF VALUE IS PALINDROME ------- <br />' ;
echo ($palindrome->checkIfPalindrome($value)) ? 'true' : 'false';


echo ' <br /> ------- GETTING LONGEST PALINDROME ------- <br />' ;
$longest = 'abaxyzzyxf';
echo $palindrome->getLongestPalindrome($longest);

echo ' <br /> ------- Min Partion Palindrome ------- <br />' ;
$palindrome->minPalPartion($longest);
