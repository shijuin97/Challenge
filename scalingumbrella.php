<?php  
  /* $R - Row index set as 3 row
     $C - Column index set as 3 column
 */
$R = 3; 
$C = 3; 
  
function PrintArray($m, $n, &$a) 
{ 
    /* $k - starting row index 
        $m - ending row index 
        $l - starting column index 
        $n - ending column index 
        $i - iterator 
    */
    $k = 0; 
    $l = 0; 
  

  
    while ($k < $m && $l < $n) 
    { 
        /* Print the first row from 
           the remaining rows */
        for ($i = $l; $i < $n; ++$i) 
        { 
            echo $a[$k][$i] . " "; 
        } 
        $k++; 
  
        /* Print the last column  
        from the remaining columns */
        for ($i = $k; $i < $m; ++$i) 
        { 
            echo $a[$i][$n - 1] . " "; 
        } 
        $n--; 
  
        /* Print the last row from 
           the remaining rows */
        if ($k < $m) 
        { 
            for ($i = $n - 1; $i >= $l; --$i) 
            { 
                echo $a[$m - 1][$i] . " "; 
            } 
            $m--; 
        } 
  
        /* Print the first column from 
           the remaining columns */
        if ($l < $n) 
        { 
            for ($i = $m - 1; $i >= $k; --$i) 
            { 
                echo $a[$i][$l] . " "; 
            } 
            $l++;  
        }      
    } 
} 
  

$a = array(array(1, 2, 3), 
           array(4, 5, 6), 
           array(7, 8, 9)); 
echo '<b>Arrange array</b><br>';
PrintArray($R, $C, $a); 
  

?> 