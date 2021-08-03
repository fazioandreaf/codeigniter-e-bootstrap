<div class="container-fluid">
   <h1 class="border-bottom border-dark pt-4 pb-4"  >Corsi</h1>
   <a href="/main/corso_new">
        <button type="button" class="btn btn-primary">
            Inserimento nuovo  corso
        </button>
    </a>
   <!-- <div class="pt-4 pb-4">
    filtri
   </div> -->
   <div class="pt-4 pb-4 container-fluid t-cust">
    <div class="row pt-1 pb-1">
        <div class="fw-bold col-4">Titolo</div>
        <div class="fw-bold col-4">Descrizione</div>
    </div>
    <?php 
 foreach($arr as $i){
    echo '<div class="row pt-2 pb-2">';
    foreach($i as $key=>$value){
        if($key=='id')
        echo '<div class="col-4"><a href="/main/corso_singolo/'.$value.'" class="text-decoration-none">';
        if($key=='titolo')
        echo '<i class="fas fa-eye"></i></a> '.$value.'</div>';
        if($key=='descrizione')
        echo '<div class="col-8">'.$value.'</div>';
       }       
       echo '</div>';
   }
    ?>
    </div>
</div>
