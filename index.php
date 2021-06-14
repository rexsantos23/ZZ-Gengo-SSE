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

    /**
     * [minPalPartion description]
     * @param  [type] &$str [description]
     * @return [type]       [description]
     */
    function minPalPartion(&$str)
    {
     
        //Get the length of the string
        $n = strlen($str);
        $C = array_fill(0, $n, 0);
        $p = array_fill(0, 10, array_fill(0, 10, 0));
 
        for ($i = 0; $i < $n; $i++) {
            $P[$i][$i] = true;
        }

        for ($L = 2; $L <= $n; $L++) {
            // For substring of length L, set
            // different possible starting indexes
            for ($i = 0; $i < $n - $L + 1; $i++) {
                $j = $i + $L - 1; // Set ending inde
          
                if ($L == 2) {
                    $P[$i][$j] = ($str[$i] == $str[$j]);
                } else {
                    $P[$i][$j] = ($str[$i] == $str[$j]) &&
                              $P[$i + 1][$j - 1];
                }
            }
        }
 
        for ($i = 0; $i < $n; $i++) {
            if ($P[0][$i] == true) {
                $C[$i] = 0;
            } else {
                $C[$i] = PHP_INT_MAX;
                for ($j = 0; $j < $i; $j++) {
                    if ($P[$j + 1][$i] == true &&
                       1 + $C[$j] < $C[$i]) {
                        $C[$i] = 1 + $C[$j];
                    }
                }
            }
        }
       
        return $C[$n - 1];
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
echo $palindrome->minPalPartion($longest);
