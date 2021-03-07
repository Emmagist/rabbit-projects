<?php
    require "config/init.php";

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $search = $_POST['search'];
        $search_result = $db->searchData(TBL_STATE, "*", "current_state", "$search_result", "status = 0");

        if ($search_result > 0) {
            foreach ($search_result as $result) :
                $outPut .= '<h5 class="ml-5">' . $result["current_state"] .'</h5>
                    <ul><li><a href="not.php">' . $result["current_state"] .'</a></li></ul>';
            endforeach;
            echo $output;
            
        }else {
            echo 'Record not found';
        }
    }

    // $output = '';
    // $search_result = $db->searchData(TBL_STATE, "*", "current_state", "status = '0'");

    // if ($search_result > 0) {
    //     foreach ($search_result as $result) :
    //         $outPut .= '<h5 class="ml-5">' . $result["current_state"] .'</h5>
    //             <ul><li>' . $result["current_state"] .'</li></ul>';
    //     endforeach;
    //     echo $output;
    // }else {
    //     echo "No Data Found";
    // }
  
    //   if (isset($_POST['search'])) {
    //      //$item = $_POST['search'];
    //      $outPut = '';
    //      $item = '%'.$_POST["search"].'%';
    //     //echo $item;exit;
    //     $search_result = $db->search(TBL_STATE, "*","current_state LIKE'$item'","status = 0");

    //     //var_dump($search_result);exit;
      
    //     if ($search_result > 0) {
    //         $outPut .= '<h5 class="ml-5">Lagos</h5>';
    //         foreach ($search_result as $result) {
    //             $outPut .= '<ul><li>' . $result["current_state"] .'</li></ul>';
    //         }
    //         echo $outPut;
    //     }else {
    //         echo "No data found";
    //     }
    //   }
    
?>



<script src="../js/script.js"></script>