<?php

    if (!empty($error)) {
        //foreach ($error as $error) {
            echo "<li class='text-center alert alert-danger'  role='alert' style='list-style: none;transition: all, 0.5s ease;' id='error'>".$error."</li>";
        //}
        
    }

?>

<script>
    $(document).ready(function () {
        if ($('#error').show()) {
            setTimeout(function(){
                $("#error").fadeOut();
            }, 4000);
        }
    })
</script>