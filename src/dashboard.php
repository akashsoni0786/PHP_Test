<?php 
session_start();
if(isset($_SESSION['mails'])){
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <title>Dashboard</title>
</head>
<body>
    <h3>All Employees</h3>
    <table id="allpersons" style="border: 1px solid red;">

    </table>
<button id="logout">Logout</button>
    <script>

        $(document).ready(function(){
            allData();
            function allData(){
                var show = 0;
                $.ajax({
                    url :'server.php',
                    type :'POST',
                    data :{show : true},
                    success:function(result)
                    {
                      $("#allpersons").html(result);
                    }
                });
            }
            
        $("#logout").click(function(){
            window.location = 'logout.php';
        });
        });
    </script>
</body>
</html>

<?php
}
else{
    echo "Error 404";
}
?>