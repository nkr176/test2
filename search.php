<?php 
//----------------------------- ส่วนรับค่า
$list_p = $_POST['datalist'];
$type = $_POST['search_type'];
$search = $_POST['search'];
//----------------------------- ส่วนเตรียมข้อมูล
$str  = explode(',',$list_p);
$strlegh = count($str); 
$list = array();
for ($m = 0; $m < $strlegh ; $m++) { 
    array_push($list,$str[$m]);
}
$length =  count($list);
//----------------------------- ส่วนทำงาน
echo 'List : ['.$list_p.'] <br>';
echo 'Search : '.$search.'<br>';
echo 'Result :::<br>';
if($type == 1){//-----------------------Linear
    $a = 1;
    for ($i = 0; $i < $length ; $i++) { 
        if($list[$i] == $search){
            echo 'Round: '.$a." ===> ".$search." = ".$list[$i]." found !! <br>"; 
            break;
        }else{
            echo 'Round: '.$a." ===> ".$search." != ".$list[$i]."<br>"; 
        }
        if($i == $length -1 ){
            echo " Not found";
        }
        $a++;
    }
}elseif($type == 2){//-----------------------binary
    $low = 0;
    $i = 1;
    $hight = $length - 1;
    while ($low < $length)
    {
        $mid = floor(($low + $hight) / 2); 
        if($list[$mid] == $search ){
            echo "Round: ".$i." = Mid = ".$mid." ===> ".$search." = ".$list[$mid]." found !! |L = ".$low." H = ".$hight."<br>";
            break;
        }
        echo 'Round: '.$i." => Mid = ".$mid." ===> ".$search." != ".$list[$mid]." |L = ".$low." H = ".$hight."<br>"; 
        if($search < $list[$mid]){
                $hight = $mid - 1;
        }else{
            $low  = $mid + 1;
        }
        $i++;
    }

}elseif($type == 3){//-----------------------bumble
    for ($i=0; $i < $length ; $i++) { 
       for ($j=0; $j < $length - $i - 1 ; $j++) { 
           if($list[$j] > $list[$j+1] ){
                echo "Now ".$list[$j]." > ". $list[$j+1]; 
                $t = $list[$j];
                $list[$j] = $list[$j+1];
                $list[$j+1] = $t;
                echo " change ".$list[$j]." > ". $list[$j+1]."<br>"; 
           }else{
                echo "Now ".$list[$j]." < ". $list[$j+1]; 
               echo " Not change <br>";
           }
       }
    }
    echo "=============<br>";
    echo "Sort To : ";
    for ($r=0; $r < $length ; $r++) { 
        echo $list[$r];
        echo ($r == $length -1)? '' : ',';
    }
    echo "<br> === Binary Search === <br>";
    //-----------------------binary search
    $low = 0;
    $i = 1;
    $hight = $length - 1;
    while ($low < $length)
    {
        $mid = floor(($low + $hight) / 2); 
        if($list[$mid] == $search ){
            echo "Round: ".$i." = Mid = ".$mid." ===> ".$search." = ".$list[$mid]." found !! |L = ".$low." H = ".$hight."<br>";
            break;
        }
        echo 'Round: '.$i." => Mid = ".$mid." ===> ".$search." != ".$list[$mid]." |L = ".$low." H = ".$hight."<br>"; 
        if($search < $list[$mid]){
                $hight = $mid - 1;
        }else{
            $low  = $mid + 1;
        }
        $i++;
    }
}
?>