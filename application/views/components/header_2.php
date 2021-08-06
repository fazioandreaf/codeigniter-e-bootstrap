</head>
<body>
<div id="app">
    <div class="container-fluid" style="position:relative">
    <?php 
        // echo '<header class="fixed-top ';
        // if(!empty($view)){
        //     if($view=='test') echo 'test">';
        //     elseif($view=='corso') echo 'corso">';
        //     elseif($view=='exp') echo 'exp">';
        // }else echo '">';
    ?>
     <header class="fixed-top" :class="colore">
     <!-- <header v-else class="fixed-top"> -->
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
                <li ><a href="#"  @click="switch_test_corso"  :disabled="!test_corso_toggle"class="nav-link"> Home</a> </li>
                <li ><a href="corso:;" @click="switch_test_corso"  class="nav-link"> Vedi i corsi</a> </li>
                <li ><a href="/main/form" class="nav-link"> Inserisci nuovo utente</a> </li>
                <li ><a href="/main/corso_new" class="nav-link"> Inserisci nuovo corso</a> </li>
            </ul>
            </span>
            <span class="nav-link">
            <i class="fas fa-cogs"></i>
                <i class="fas fa-chevron-down"></i>
            </span>
        </div>
    </header>
    <main>
