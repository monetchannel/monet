<?php
$x_arr=array(0,2,4,6);
$y_arr=array(0,-5,-10,0);

$l=count($x_arr);                               // length of json array
$video_length=6;                               // length of video for x axis length
$xp=0;
$yp=0;
$i=0;
$n_area=0;
$p_area=0;

while($i<$l){
    
    $x=$x_arr[$i];
    $y=$y_arr[$i];
    if(($i==0)&&($x!=0)){
        if($y>0){
          calc($i, $x, $y, '0','1');
        }
        elseif ($y==0) {
            calc($i, $x, $y, '0','0');
        }
        elseif ($y<0) {
             calc($i, $x, $y, '0','-1');
        }
        
    }
    else if($x==0){                                  //when snap is taken at time 0 sec
        calc($i, $x, $y);
    }
    else {                                      //when snap is not take at time 0 sec
            
        if($y>0){                               // for postitive engagement value
            if($y>$yp){                         // current y greater than previous y
                if($yp<0){
                    $x_mid=$x-($y/(($y-$yp)/($x-$xp))); //intercept on x axis by the line
                    $ar1=(1*$yp*($x_mid-$xp))/2;
                    $ar2=(1*$y*($x-$x_mid))/2;
                    
                    calc($i, $x, $y, $ar1,'-1');
                    calc($i, $x, $y, $ar2,'1');
                }
                elseif ($yp>0) {
                    $ar1=(1*($x-$xp)*($y-$yp))/2;
                    $ar2=($x-$xp)*$yp;
                    
                    calc($i, $x, $y, $ar1,'1');
                    calc($i, $x, $y, $ar2,'1');
                }
                elseif ($yp==0) {
                    $ar=(1*($x-$xp)*$y)/2;
                    calc($i, $x, $y, $ar,'1');
                }
                
            }
            elseif ($y==$yp) {                  // current y value equal to previous y
                $ar=($x-$xp)*$yp;
                calc($i, $x, $y, $ar,'1');
            }
            elseif ($y<$yp) {                   // current y smaller than previous y
                if ($y>0) {
                    $ar1=(1*($x-$xp)*($y-$yp))/2;
                    $ar2= $y*($x-$xp);
                    
                    calc($i, $x, $y, $ar1,'1');
                    calc($i, $x, $y, $ar2,'1');
                }
                elseif ($yp==0) {
                
                }
                else if($y<0){
                   $x_mid=$x-($y/(($y-$yp)/($x-$xp))); //intercept on x axis by the line
                   $ar1=(1*$yp*($x_mid-$xp))/2;
                   $ar2=(1*$y*($x-$x_mid))/2;
                   
                   calc($i, $x, $y, $ar1,'1');
                   calc($i, $x, $y, $ar2,'-1');
                   }
                
            }
        }
        elseif ($y<0) {                        // for negative engagement value
            if($y>$yp){                        // current y greater than previous y
                if($y>0){                      // current y value more than 0
                    ///////////////Not Required as in line 93 $y is less than 0
                }
                elseif ($y==0) {               // current y value equals 0
                    ///////////////Not Required as in line 93 $y is equal to 0
                }
                elseif ($y<0) {                // current y value less than 0
                    $ar1=(1*($x-$xp)*($y-$yp))/2;
                    $ar2=$y*($x-$xp);
                    
                    calc($i, $x, $y, $ar1,'-1');
                    calc($i, $x, $y, $ar2,'-1');
                }                
            }
            elseif ($y<$yp) {                   // current y greater than previous y
                if($yp>0){
                   $x_mid=$x-($y/(($y-$yp)/($x-$xp))); //intercept on x axis by the line
                   $ar1=(1*$yp*($x_mid-$xp))/2;
                   $ar2=(1*$y*($x-$x_mid))/2;
                   
                   calc($i, $x, $y, $ar1,'1');
                   calc($i, $x, $y, $ar2,'-1');
                }
                elseif ($yp==0) {
                    $ar=(1*($x-$xp)*$y)/2;
                    calc($i, $x, $y, $ar,'-1');
                }
                elseif ($yp<0) {
                    $ar1= $yp*($x-$xp);
                    $ar2=(1*($x-$xp)*($y-$yp))/2;
                    
                    calc($i, $x, $y, $ar1,'-1');
                    calc($i, $x, $y, $ar2,'-1');
                }
            }
            elseif ($y=$yp) {
              $ar=(($x-$xp)*$y);
              calc($i, $x, $y, $ar,'-1');
            }
        }
        elseif ($y==0) {
            if($yp>0){
                $ar=(1*($x-$xp)*$yp)/2;
                calc($i, $x, $y, $ar,'1');
            }
            elseif ($yp<0) {
                $ar=(1*($x-$xp)*$yp)/2;
                calc($i, $x, $y, $ar,'-1');
            }
        
        }
    }
    $i=$i+1;    
}

if($xp!=$video_length){
    if($y>0){
        $ar= ($video_length-$xp)*$yp;
        $p_area=$p_area+ ($ar<0?(-1)*$ar:$ar);
    }
    elseif ($y<0) {
        $ar= ($video_length-$xp)*$yp;
        $n_area=$n_area+ ($ar<0?(-1)*$ar:$ar);
    }
    echo "<br> $i) _ve Area: ".$n_area."  --- +ve Area:".$p_area;
}

function calc($i, $x, $y, $are=0, $sign=0){
    global $n_area, $p_area,$xp,$x,$yp,$y;
    if($are==0){
        if($sign>0){
            $p_area=($x*$y);
        }
        elseif ($sign<0) {
            $n_area=(-1*($x*$y));
        }
    }
    
    if($sign>0){
        $p_area=$p_area+ ($are<0?(-1)*$are:$are);
    }
    elseif ($sign<0) {
        $n_area=$n_area+ ($are<0?(-1)*$are:$are);
    }
    $xp=$x;
    $yp=$y;
    echo "<br> $i) _ve Area: ".$n_area."  --- +ve Area:".$p_area;
}

$t_area=$n_area+$p_area;
if($t_area==0){
    $n_cent=0;
    $p_cent=0;
}
else {
    $n_cent=($n_area/$t_area)*100;
    $p_cent=($p_area/$t_area)*100;
 }
echo "<br><br>Total Negative Area: $n_area";
echo "<br>Total Postitive Area: $p_area";
echo "<br>Net Total Area: $t_area<br>";

echo "<br>Percentage Negative Area: $n_cent %";
echo "<br>Percentage Postitive Area: $p_cent %";
?>