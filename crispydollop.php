<?php

$test = [
         12,
         531,
         2071,
         9,
         111,
         531];
         

echo '<b>Next bigger number</b><br>';
foreach ($test as $t) {
    echo $t, ' --> ',next_number ($t, 1), '<br>';
}

/* 
 Returns the next bigger of $num with the same digits. If no bigger number exits if will returns -1.
 $op > 0: Return the next bigger number.
 $op = 0: Return -1.
*/
function next_number ($num, $op) {
    $res   = -1;                // Result
    $arr   = str_split ($num);  // get an array of digits
    $max_i = count($arr)-1;     // max array index
    
    for ($i=$max_i; $i>=0; $i--) {
        // Remove the element with index i from the array and save its value in n.
        $n = array_splice ($arr, $i, 1)[0];
        // Inner loop: Walk backwards through the array.
        // Beginn with i-1.
        for ($j=$i-1; $j>=0; $j--) {
            // Search for a bigger digit then n.
            if (($arr[$j] < $n && $op > 0)) {
                // Left side of the array without the bigger digit.
                $left   = array_slice ($arr, 0, $j);
                // Push n to the left side.
                $left[] = $n;
                // Right side of the array, including the previous found bigger digit.
                $right  = array_slice ($arr, $j);
                // Sort the right side ascending/descending.
                if ($op < 0) {
                    rsort ($right);
                } else {
                    sort ($right);
                }
                // Merge left and right side and convert the result to a string.
                $str = implode (array_merge ($left, $right));
                // If the first char isn't a zero this is the result.
                if ($str [0] != '0') {
                    $res = $str;
                }
                break 2; 
            }
        }
        // No result for n was found. Put it back to the array and continue the loop with the next digit.
        array_splice ($arr, $i, 0, $n);
    }
    return $res;
}
?>