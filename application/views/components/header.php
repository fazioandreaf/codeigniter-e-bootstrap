<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="shortcut icon" href="https://thumbs.dreamstime.com/b/yin-yang-symbol-vector-icon-harmony-balance-yinyang-sign-isolated-transparent-background-eps-186322218.jpg" type="image/x-icon">
    <script src="/assets/js/app.js" defer></script>
</head>
<body>
    <div class="container-fluid" style="position:relative">
    <?php 
        echo '<header class="fixed-top ';
        if(!empty($view)){
            if($view=='test') echo 'test">';
            elseif($view=='corso') echo 'corso">';
        }else echo '">';
    ?>
     
        <div class="nav ">

            <span class="nav-link">
            <?php
             if(strlen($title)>0){
                 echo $title;
             }
            ?>
            </span>
            <ul class="nav flex-fill">
                <li class="nav-link"></li>
                <li ><a href="/" class="nav-link"> Home</a> </li>
                <li ><a href="/main/form" class="nav-link"> Inserisci nuovo utente</a> </li>
                <li ><a href="/main/corso_new" class="nav-link"> Inserisci nuovo corso</a> </li>
                <li ><a href="/main/corsi" class="nav-link"> Vedi i corsi</a> </li>
            </ul>
            </span>
            <span class="nav-link">
            <i class="fas fa-cogs"></i>
                <i class="fas fa-chevron-down"></i>
            </span>
        </div>
    </header>
    <main>
        

        
        
    