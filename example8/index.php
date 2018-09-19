 <?php

 session_start();
 //$_SESSION['ReCap1'] = "1ab2cd";
 $_SESSION['ReCap1'] = random_string(6,false,true);

 echo "Recaptcha: ";
 echo "<img src='recap1.php' border='1px'>";
 echo "<br><br>";
 echo '<form action="page1.php" method="post">';
 echo 'Value: <input type="text" name="ReCap1"> <input type="submit" value="send">';
 echo '</form>';




function random_string($length,$noCaps = false, $addNumbers = false)    { 

    // bugfix. to avoid human reading errors, the chars o,O,i,I,l,L,1,0 do not appear any more in the result string. 
    $w_s=array ('a','b','c','d','e','f','g','h','j','k','m','n','p','q','r','s','t','u','v','w','x','y','z'); 
    if($noCaps === false) { 
        $w_s = array_merge($w_s,array_map('strtoupper',$w_s)); 
    } 
    if($addNumbers === true) { 
        $w_s = array_merge($w_s,array(2,3,4,5,6,7,8,9,2,3,4,5,6,7,8,9)); 
    } 
    $max = count($w_s) - 1; 
    $pw = ""; 
    for($i=0;$i<$length;$i++) { 
        srand((double)microtime()*1000000); 
        $wg=rand(0,$max); 
        $pw.=$w_s[$wg]; 
        usleep (33);
    } 
    return $pw; 
} 

 ?>