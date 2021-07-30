<div class="container-fluid">
    <h1>
        Utente singolo

</h1>
    <div class="container-fluid">
        <ul>
            <?php 
                echo '<li> Nome: '.$get[0]->nome.'</li>';
                echo '<li> Cognome: '.$get[0]->cognome.'</li>';
                echo '<li> Etá: '.$get[0]->eta.'</li>';
                echo '<li> Genere: '.$get[0]->genere.'</li>';
            
            ?>
        </ul>
        <div>
            <h2>Corsi iscritti</h2>
            <ul>
                <?php 
                // var_dump($get[0]);
                // if(count($get)>0){   
                                     
                    foreach($get as $i)
                    if(!empty($i->titolo))
                    echo '<li>'.($i->titolo).'</li>';
                // }else{
                //     echo 'Nessun corso attivo';
                // }
                ?>
            </ul>
        </div>
    </div>
</div>