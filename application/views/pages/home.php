<div class="container-fluid">
   <h1 class="border-bottom border-dark pt-4 pb-4"  >Corsisti</h1>
   <a href="main/form">
     Inserimento nuovo  utente
 </a>
   <!-- <div class="pt-4 pb-4">
    filtri
   </div> -->
   <div class="pt-4 pb-4 container-fluid t-cust">
    <div class="row">
        <div class="fw-bold col-4">Nome</div>
        <div class="fw-bold col-4">Cognome</div>
        <div class="fw-bold col">Etá</div>
        <div class="fw-bold col">Genere</div>
    </div>
    <?php 
 foreach($arr as $i){
     echo '<div class="row pt-2 pb-2">';
     $id=$i->id;
     foreach($i as $key=>$value){

         if($key=='id')
         echo '<div class="col-4"><a href="/main/utente_singolo/'.$value.'" class="text-decoration-none"><i class="fas fa-eye"></i></a>';
         if($key=='nome')
         echo '<span class="ms-3">'.$value.'</span></div>';
         if($key=='cognome')
         echo '<div class="col-4">'.$value.'</div>';
         if($key=='eta')
         echo '<div class="col">'.$value.'</div>';
         if($key=='genere'){
             echo '<div class="col d-flex justify-content-between"><span>'.$value.'</span>';
             echo '<span class=""><a href="/main/edit/'.$id.'"><i class="fas fa-edit"></i></a></span></div>';

         }
        }       
        echo '</div>';
    }
    ?>
    </div>
</div>
