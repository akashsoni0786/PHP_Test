
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>Php Test</title>
</head>
<body>
    <table>
        <tr><th>Login Here</th></tr>
        <tr><td>Enter Email :</td><td><input placeholder="Enter email" id="mail"/></td></tr>
        <tr><td>Enter Password :</td><td><input type="password"  id="password"placeholder="Enter password"/></td></tr>

        <tr><td></td><td><button id="submitbtn">Submit</button></td></tr>
    </table>
    <script>
        $(document).ready(function(){
            $("#submitbtn").click(function(){
                var mail = $("#mail").val();
                var pass = $("#password").val();
                $.ajax({
                    url : 'server.php',
                    type : "POST",
                    data : {mail : mail,
                            password : pass},
                    success: function(result){
                        if(result == "Successfully logged in"){
                            window.location = 'dashboard.php';
                        }
                        else{
                            alert(result);
                        }
                        
                    }
                });
            });
        });
    </script>
</body>
</html>