<?php
    require "config/init.php";
  
      if (isset($_POST['search'])) {
         //$item = $_POST['search'];
         $outPut = '';
         $item = '%'.$_POST["search"].'%';
        //echo $item;exit;
        $search_result = $db->search(TBL_STATE, "*","current_state LIKE'$item'","status = 0");

        //var_dump($search_result);exit;
      
        if ($search_result > 0) {
            $outPut .= '<h5 class="ml-5">Lagos</h5>';
            foreach ($search_result as $result) {
                $outPut .= '<ul><li>' . $result["current_state"] .'</li></ul></div>';
            }
            echo $outPut;
        }else {
            echo "No data found";
        }
      }
    
?>



<script src="../js/script.js"></script>