</head>
<body>
    <div class="container-fluid" style="position:relative">
    <?php 
        echo '<header class="fixed-top ';
        if(!empty($view)){
            if($view=='test') echo 'test">';
            elseif($view=='corso') echo 'corso">';
            elseif($view=='exp') echo 'exp">';
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
                <li ><a href="/main/corsi" class="nav-link"> Vedi i corsi</a> </li>
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
        <div id="app">