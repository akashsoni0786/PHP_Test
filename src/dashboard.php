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
    
    <br>
    <input id="search" placeholder="Search here"/>
    <br>
    <h3>All Employees</h3>
    <br>
    <table id="allpersons" style="border: 1px solid red;">

    </table>
    <br>
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
        $("#search").keyup(function(){
            var ar = $("#search").val();
            $.ajax({
                    url :'server.php',
                    type :'POST',
                    data :{search : true},
                    success:function(result)
                    {
                    ar2 = JSON.parse(result);
                    console.log(ar2);
                    var t= '';
                    for(let i=0;i<3;i++)
                    {
                        
                        if(ar.toLowerCase() == ar2[i]['mail'].slice(0,ar.length))
                        {
                            console.log(ar2[i]['mail']);
                            t += '<tr><td>'+ar2[i]['mail']+'</td><td>'+ar2[i]['pass']+'</td></tr>';
                        }
                        
                    }
                       $("#allpersons").html(t);
                    }
                });
        });
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