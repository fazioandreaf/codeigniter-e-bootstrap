<div class="container-fluid">
   <h1 class="border-bottom border-dark pt-4 pb-4"  >Corsi</h1>
   <a href="main/form">
     Inserimento nuovo  corso
    </a>
   <!-- <div class="pt-4 pb-4">
    filtri
   </div> -->
   <div class="pt-4 pb-4 container-fluid">
    <div class="row">
        <div class="fw-bold col-4">Titolo</div>
        <div class="fw-bold col-4">Descrizione</div>
    </div>
    <?php 
     echo '<div class="row">';
    foreach($arr as $key=>$value){
        
            if($key=='titolo')
            echo '<div class="col-4">'.$value.'</div>';
            if($key=='descrizione')
            echo '<div class="col-8">'.$value.'</div>';
            if($key=='eta');
                
            }
        echo '</div>';
    ?>
    </div>
</div>
