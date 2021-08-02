<div class="container-fluid">
    <h1>
        Corso singolo
    </h1>
    <div class="container-fluid">
            <?php 
                echo '<h3> Titolo: </h3><span>'.$get[0]->titolo.'</span>';
                echo '<h3> Descrizione: </h3><p> '.$get[0]->descrizione.'</p>';            
            ?>
        <div>
            <h2>Utenti iscritti
                <a href="/corso/add/<?php
                echo $get[0]->id?>">
                    <i class="fas fa-plus"></i>
                </a>
                 </h2>
                <?php 
                if(!empty($get[0]->nome)){
                    echo  '<span>Numero totale: '.count($get).'</span>';
                    foreach($get as $i){
                        echo '<ul><li><a href="/main/utente_singolo/'.$i->id.'">'.($i->nome).' '.($i->cognome).'</a>';
                        if(preg_match('/s/i',$i->genere)==1)
                        echo ' M';
                        elseif(preg_match('/f/i',$i->genere)==1)
                        echo ' F';
                        else
                        echo ' U'; 
                        echo ', etá: '.($i->eta).'</li></ul>';
                    }                        
                }else{
                    echo 'Nessun utente ancora inscritto al corso';
                }
                ?>
            </ul>
        </div>
    </div>
</div>