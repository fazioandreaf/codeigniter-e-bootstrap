<div class="container-fluid">
   <h1 class="border-bottom border-dark pt-4 pb-4"  >Corsisti</h1>
   <a href="/main/form">
   <button type="button" class="btn <?php 
           if(!empty($view)){
            if($view=='test') echo 'test';
            elseif($view=='corso') echo 'corso';}
?>">

       Inserimento nuovo  utente
    </button>
    </a>
   <div class="pt-4 pb-5 mb-5 container-fluid t-cust">
        <div class="row py-2">
            <div class="fw-bold col-2">Funzioni</div>
            <div class="fw-bold col-3">Nome</div>
            <div class="fw-bold col-3">Cognome</div>
            <div class="fw-bold col-1">Etá</div>
            <div class="fw-bold col-3">Genere</div>
        </div>
        <?php 
            foreach($arr as $i){
                echo '<div class="row py-2">';
                $id=$i->id;
                echo '<div class="col-2">
                <span class="action">
                <a href="/main/utente_singolo/'.$id.'" class="text-decoration-none"><i class="fas fa-eye"></i></a>
                <a href="#" data-id="'.$id.'" class="delete"><i class="fas fa-user-minus"></i></a>
                <a href="/main/edit/'.$id.'"><i class="fas fa-edit"></i></a></span>
                </div>';
                foreach($i as $key=>$value){
                    if($key=='nome')
                    echo '<div class="col-3"><span>'.$value.'</span></div>';
                    if($key=='cognome')
                    echo '<div class="col-3"><span>'.$value.'</span></div>';
                    if($key=='eta')
                    echo '<div class="col-1"><span>'.$value.'</span></div>';
                    if($key=='genere')
                        echo '<div class="col d-flex justify-content-between"><span>'.$value.'</span></div>';
                }       
                echo '</div>';
            }
        ?>
    </div>
    <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                <a href="/main/index">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Chiudi</button>
                </a> 
                <a id="delete_modal" href="/main/index/<?php echo $arr[0]->id?>">
                <button type="button" class="btn btn-danger">
                       Elimina
                    </button>
                </a>
            </div>
            </div>
        </div>
    </div>
</div>
