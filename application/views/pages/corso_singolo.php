<div class="container-fluid">
    <h1>
        Corso singolo
    </h1>
    <div class="container-fluid">
            <?php 
                echo '<h3> Titolo: </h3><span>'.$get[0]->titolo.'</span>';
                echo '<h3> Descrizione: </h3><p> '.$get[0]->descrizione.'</p>';        
            ?>
        <div class="utenti_iscritti" >
            <h2>Utenti iscritti
                </h2>
            <a href="/corso/add/<?php
            if(!empty($get[0]->id_corsi))
                echo $get[0]->id_corsi;
            else
                echo $get[0]->id;
            ?>">
                <span class=" btn test">
                    Aggiungi ed elimina corsisti
                </span> 
            </a>
            <div class="pt-4 pb-5 mb-5 container-fluid t-cust">
                <div class="row pt-2 pb-2">
                    <div class="col-4"><span class="fw-bold">Nome</span></div>
                    <div class="col-3"><span class="fw-bold">Cognome</span></div>
                    <div class="col"><span class="fw-bold">Etá</span></div>
                    <div class="col"><span class="fw-bold">Genere</span></div>
                </div>
                <?php 
                    if(!empty($get[0]->nome)){
                        foreach($get as $i){
                            echo '<div class="row pt-2 pb-2">';
                            echo '<div class="col-4"><a href="/main/utente_singolo/'.$i->id.'" class="text-decoration-none"><i class="fas fa-eye"></i></a>';
                            echo '<span class="ms-3">'.$i->nome.'</span></div>';
                            echo '<div class="col-3">'.$i->cognome.'</div>';
                            echo '<div class="col">'.$i->eta.'</div>';
                            echo '<div class="col">'.$i->genere.'</div>';
                            echo '</div>';
                        }                                
                    }              
                            // if(!empty($get[0]->nome)){
                            //     echo  '<span>Numero totale: '.count($get).'</span>';
                            //     foreach($get as $i){
                            //         echo '<ul><li><a  href="/main/utente_singolo/'.$i->id.'">'.($i->nome).' '.($i->cognome).'</a>';
                            //         if(preg_match('/s/i',$i->genere)==1)
                            //         echo ' M';
                            //         elseif(preg_match('/f/i',$i->genere)==1)
                            //         echo ' F';
                            //         else
                            //         echo ' U'; 
                            //         echo ', etá: '.($i->eta).'</li></ul>';
                            //     }                        
                            // }else{
                            //     echo 'Nessun utente ancora inscritto al corso';
                            // }
                            echo '</ul>';
                ?>
            </div>
        </div>
    </div>
</div>