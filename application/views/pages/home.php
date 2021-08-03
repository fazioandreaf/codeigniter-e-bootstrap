<div class="container-fluid">
   <h1 class="border-bottom border-dark pt-4 pb-4"  >Corsisti</h1>
   <a href="main/form">
   <button type="button" class="btn btn-primary">

       Inserimento nuovo  utente
    </button>
</a>
   <!-- <div class="pt-4 pb-4">
    filtri
   </div> -->
   <div class="pt-4 pb-4 container-fluid t-cust">
        <div class="row">
            <div class="fw-bold col-4">Nome</div>
            <div class="fw-bold col-3">Cognome</div>
            <div class="fw-bold col-3">Etá</div>
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
                    echo '<div class="col-3">'.$value.'</div>';
                    if($key=='eta')
                    echo '<div class="col">'.$value.'</div>';
                    if($key=='genere'){
                        echo '<div class="col d-flex justify-content-between"><span>'.$value.'</span>';
                        echo '
                        <span >
                        <a href="#" id="delete" class="pe-3"><i class="fas fa-user-minus"></i></a>
                        <a href="/main/edit/'.$id.'"><i class="fas fa-edit"></i></a></span></div>
                        ';

                    }
                    }       
                    echo '</div>';
            }
        ?>
    </div>
    <!-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Utente che si vuole eliminare</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Sicuro che vuoi eliminare il corsista? <?php
                ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Chiudi</button>
                <button type="button" class="btn btn-danger">Elimina</button>
            </div>
            </div>
        </div>
    </div> -->
</div>
