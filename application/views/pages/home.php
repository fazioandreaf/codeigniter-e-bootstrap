
   <h1 class="border-bottom border-dark pt-4 pb-4"  >Corsisti</h1>
   <!-- <div class="pt-4 pb-4">
    filtri
   </div> -->
   <div class="pt-4 pb-4 container-fluid">
    <div class="row">
        <div class="col-4">Nome</div>
        <div class="col-4">Cognome</div>
        <div class="col">Etá</div>
        <div class="col">Genere</div>
    </div>
    
    <?php 
 foreach($arr as $i){
     echo '<div class="row">';
     foreach($i as $key=>$value){
         if($key=='nome')
         echo '<div class="col-4">'.$value.'</div>';
         if($key=='cognome')
         echo '<div class="col-4">'.$value.'</div>';
         if($key=='eta')
         echo '<div class="col">'.$value.'</div>';
         if($key=='genere')
         echo '<div class="col">'.$value.'</div>';
         
        }
       
        echo '</div>';
    }
    ?>
    </div>
 <a href="main/form">
     Inserimento nuovo  utente
 </a>