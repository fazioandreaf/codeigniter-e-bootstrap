<div class="container-fluid">
    <h1>
        Utente singolo

</h1>
    <div class="container-fluid">
        <ul>
            <?php 
                // echo '<li> Nome: '.$get[0]->nome.'</li>';
                // echo '<li> Cognome: '.$get[0]->cognome.'</li>';
                // echo '<li> Etá: '.$get[0]->eta.'</li>';
                // echo '<li> Genere: '.$get[0]->genere.'</li>';
            
            ?>
        </ul>
        <div>
            <h2>Corsi iscritti</h2>
            
            <a href="/test/test_on_corso/<?php
                if(!empty($get[0]->id_test))
                    echo $get[0]->id_test;
                else
                    echo $get[0]->id;
                ?>">
                <button type="button" style="border:none" class="btn btn-primary corso">
                    Inserimento nuovo  corso
                </button>
                    
            </a>    
            <div class="pt-4 pb-5 mb-5 t-cust d-flex align-items-center flex-column " >
                <div class="row py-2 utente_singolo">
                    <div class="col-4"><span class="fw-bolder text-center">Fuzioni</span></div> 
                    <div class="col-8"><span class="fw-bold">Nome del corso</span></div> 
                </div>
                <?php
                // echo '<pre>';
                // var_dump(($get));
                // die();
                
                    if(!empty($get[0]->titolo)){
                        foreach($get as $i){
                            echo '<div class="row py-2 utente_singolo"><div class="col-4 text-center">';
                            echo '<a href="/test/delete_corsi_on_test/'.$i->id_test.'/'.$i->id_corsi.'" style="color:var(--bs-danger)" class="me-2">  <i class="fas fa-trash"></i></a>';
                            echo'</div>';
                            echo '<div class="col-8"><span >';
                            echo $i->titolo;
                            echo '</span></div></div>';
                        }
                    }else echo 'Non sei iscritto a nessuno corso';
                ?>
            </div>

            <h2>Esperienze lavorative
                </h2>
            <a href="/job/add/<?php
                if(!empty($get_exp[0]->id_test))
                    echo $get_exp[0]->id_test;
                    else
                    echo $get_exp[0]->id;
                    echo '/';
                ?>">
                <button type="button" style="border:none" class="btn btn-primary exp">
                    Inserimento esperienze
                </button>
                </a>
            <div class="pt-4 pb-5 mb-5 t-cust d-flex align-items-center flex-column">
                <div class="row py-2 utente_singolo">
                    <div class="col-4"><span class="fw-bold text-center">Funzioni</span></div>
                    <div class="col-8"><span class="fw-bold">Titolo del lavoro</span></div>
                </div>
                <?php 
                if(!empty($get_exp[0]->job_title)){
                    foreach($get_exp as $i){
                        echo '<div class="row py-2 utente_singolo" >';
                        echo '<div class="col-4 text-center"><a href="/job/add/'.$i->id_test.'/'.$i->id.'" style="color:var(--bs-info)"><i class="fas fa-edit"></i></a>';
                        echo '<a href="/job/delete/'.$i->id_test.'/'.$i->id.'" style="color:var(--bs-danger)" class="me-2">  <i class="fas fa-trash"></i></a></div>';
                        echo '<div class="col-8">'.$i->job_title.'</div>';
                        echo '</div>';
                    }                                
                }      
                // if(!empty($get_exp[0]->job_title)){
                //     foreach($get_exp as $i){
                //         echo '<li><a href="/job/add/'.$i->id_test.'/'.$i->id.'" style="color:var(--bs-info)"><i class="fas fa-edit"></i></a>';
                //         echo '<a href="/job/delete/'.$i->id_test.'/'.$i->id.'" style="color:var(--bs-danger)" class="me-2">  <i class="fas fa-trash"></i></a>'.($i->job_title).'</li>';
                //     }
                // }else{
                //     echo '<li> Non hai ancora nessuna esperienza lavorativa</li>';
                // }
                ?>
            </div>

            

            
        </div>
    </div>
</div>