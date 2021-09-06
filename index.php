<?php

/*Task
Write a PHP program to calculate electricity bill .
Conditions:
For first 50 units – 3.50/unit
For next 100 units – 4.00/unit
For units above 150 – 6.50/unit
You can use conditional statements.*/



$units=150;
$bill;
if(  ($units<=50)  )
   {$bill=units*3.50 ; echo $bill ;}
else if( ($units>50) && ($units<=150) )
   {$bill=$units*4.00 + $units*3.50 ; echo $bill;}   
else 
   {$bill=$units*4.00 + $units*3.50 + $units*6.50 ; echo $bill;} 

?>
