<div class="container-fluid">
    <h1>
        Corso singolo
    </h1>
    <?php 
    var_dump($get);
    ?>
    <div class="container-fluid">
            <?php 
                echo '<h3> Titolo: </h3><span>'.$get[0]->titolo.'</span>';
                echo '<h3> Descrizione: </h3><p> '.$get[0]->descrizione.'</p>';            
            ?>
        <div>
            <h2>Utenti iscritti</h2>
            <ul>
                <?php 
                if(!empty($i->titolo)){
                    echo  '<span>Numero totale: '.count($get).'</span>';
                    foreach($get as $i){
                            echo '<li>'.($i->nome).' '.($i->cognome);
                            if(preg_match('/s/i',$i->genere)==1)
                            echo ' M';
                            elseif(preg_match('/f/i',$i->genere)==1)
                            echo ' F';
                            else
                            echo ' U'; 
                            echo ', etá: '.($i->eta).'</li>';
                        }
                        
                    }else{
                        echo 'Nessun utente ancora inscritto al corso';
                    }
                ?>
            </ul>
        </div>
    </div>
</div>