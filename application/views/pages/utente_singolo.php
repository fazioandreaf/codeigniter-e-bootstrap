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
                if(!empty($get[0]->titolo)){
                    foreach($get as $i)
                        echo '<li>'.($i->titolo).'</li>';
                }else{
                    echo '<li> Non hai ancora nessun corso attivo</li>';
                }
                ?>
            </ul>
            <h2>Esperienze lavorative</h2>
            <ul>
                <?php 
                if(!empty($get_exp[0]->job_title)){
                    foreach($get_exp as $i)
                        echo '<li>'.($i->job_title).'</li>';
                }else{
                    echo '<li> Non hai ancora nessuna esperienza lavorativa corso attivo</li>';
                }
                ?>
            </ul>

            
        </div>
    </div>
</div>