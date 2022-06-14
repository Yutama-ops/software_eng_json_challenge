<?php
include('getdata.php');
include('header.php');

if(isset($_GET['search_by'])){
    $name = $_GET['name'];
    $search_by = $_GET['search_by'];
    $arr = array();
    if($search_by == 'type'){
        for($i = 0; $i<=$total_row;$i++){
            if(trim($name) === trim($obj[$i]['type'])){
                $arr[] = $obj[$i];
            }
        }
    } elseif($search_by == 'title'){
        for($i = 0; $i<=$total_row;$i++){
            if(trim($name) === trim($obj[$i]['title'])){
                $arr[] = $obj[$i];
            }
        }
    }
    elseif($search_by == 'author'){
        for($i = 0; $i<=$total_row;$i++){
            if(trim($name) === trim($obj[$i]['author'])){
                $arr[] = $obj[$i];
            }
        }
    }
    elseif($search_by == 'subject'){
        for($i = 0; $i<=$total_row;$i++){
            $str = trim($obj[$i]['Subjects']);
            $subjects = explode(';', $str);
            
            foreach($subjects as $subject){
                if(trim($name) === trim($subject)){
                    $arr[] = $obj[$i];
                }
            }
        }
    }

?>
<link rel="stylesheet" href="card.css">
<body>
    <a href="index.php">Home</a>

    <?php
    for($j = 0; $j<count($arr);$j++){
        $str = trim($arr[$j]['Subjects']);
        // $str = preg_replace("/(?<!\s);(?!\s)/", "/", $str);
        // echo $str;
        $subjects = explode(';', $str);
        // print_r($subjects);
        ?>
        <div class="movie_card" id="bright">
                <div class="info_section">
                    <div class="movie_header">
                    <!-- <img class="locandina" src="https://movieplayer.net-cdn.it/t/images/2017/12/20/bright_jpg_191x283_crop_q85.jpg"/> -->
                    <h1><?php echo $arr[$j]['title'];?></h1> <!-- title !-->
                    <h4><?php echo $arr[$j]['copyrightdate'];?></h4> <!-- copyrightdate,  !-->
                    <span class="minutes"><?php echo $arr[$j]['type'];?></span> <!-- type !-->
                    <p class="type"><?php echo $arr[$j]['author'];?></p> <!-- author or subject !--> 
                    </div>
                    <div class="movie_desc">
                    <p class="text">  <!-- subject !-->
                        <?php foreach($subjects as $subject){
                            
                            echo "<a href='detail_card.php?subject=$subject'>$subject</a> |";
                            }?> 
                    </p>
                    </div>
                    
                </div>
                <div class="blur_back bright_back"></div>
            </div>
        <?php
    }
}