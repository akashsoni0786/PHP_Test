<?php 
session_start();

$_SESSION['persons'] = array(
   'p1'=> array('mail'=>"p1@mail.com",'pass'=>"1234"),
   'p2'=>array('mail'=>"p2@mail.com",'pass'=>"1234"),
   'p3'=>array('mail'=>"p3@mail.com",'pass'=>"1234")
);
    

if(isset($_POST['mail']))
{
    $m = $_POST['mail'];
    $p = $_POST['password']; 
    $l  = "Invalid Credentials";
    foreach($_SESSION['persons'] as $i){
        if($i['mail'] == $m && $i['pass'] == $p){
            $_SESSION['mails'] =  $i['mail'];
            
            $l = "Successfully logged in";

        }

    }
    if($l == "Successfully logged in")
    {
        echo "Successfully logged in";
    }
    else{
        echo $l;
    }
   
}
if(isset($_POST['show']))
{
    $txt='';
    foreach($_SESSION['persons'] as $i)
    {
        $txt .= '<tr><td>'.$i['mail'].'</td><td>'.$i['pass'].'</td></tr>';
    }
    echo $txt;

}
?>