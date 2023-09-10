<?php 
    include 'connection.php';
    
    $id = $_POST['vote'];

    echo '
    <script type="text/JavaScript">
        var element = document.getElementById("t");

        console.log(element.innerHTML);

    </script>
    ';
?>