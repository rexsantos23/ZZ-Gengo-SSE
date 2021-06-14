# Palindrome

Palindrome is a word, phrase, or sequence that reads the same backward as forward, e.g., madam or nurses run.

##How to run

Clone this repo to your localhost, and on your address bar go to
[ZZ-Gengo-SSE](localhost/ZZ-Gengo-SSE) or localhost/ZZ-Gengo-SSE
## How it works

available variable are $value and $longest

```php
$value = 'abcdcba';

$palindrome = new Palindrome();

echo ' <br /> ------- CHECKING IF VALUE IS PALINDROME ------- <br />' ;
echo ($palindrome->checkIfPalindrome($value)) ? 'true' : 'false';


echo ' <br /> ------- GETTING LONGEST PALINDROME ------- <br />' ;
$longest = 'abaxyzzyxf';
echo $palindrome->getLongestPalindrome($longest);

echo ' <br /> ------- Min Partion Palindrome ------- <br />' ;
$palindrome->minPalPartion($longest);
```
