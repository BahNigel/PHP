<?php

function palindrome($string = ''){

    $strArr = array();
    for($i=0; $i<strlen($string); $i++ )
    {
        $palindrome = true;
        $offset = 1;

        while($palindrome)
        {
            $word = substr($string, $i-$offset, ($offset*2)+1 );
            if( $word == strrev($word) ) {
                $strArr[$word] = strlen($word);
            } else {
                $palindrome = false;
            }

            $offset++;
        }
    }
    $finArr = max($strArr);
    echo $key = array_search ($finArr, $strArr);
}

palindrome($string = "babad");
?>