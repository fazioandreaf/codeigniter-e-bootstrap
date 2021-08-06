<div class="container-fluid">
    <h1>
        Corso singolo
    </h1>
    <div class="container-fluid">
        <h3>{{corso.titolo}}</h3>
        <h4>Descrizione</h4>
        <p>{{corso.descrizione}}</p>
        <div class="utenti_iscritti" >
            <h2>Utenti iscritti
                </h2>
            <a :href="'/corso/add/'+corso.id_corsi">
                <span class=" btn test">
                    Aggiungi ed elimina corsisti
                </span> 
            </a>
            <!-- <div class="pt-4 pb-5 mb-5 container-fluid t-cust">
                <div class="row pt-2 pb-2">
                    <div class="col-4"><span class="fw-bold">Nome</span></div>
                    <div class="col-3"><span class="fw-bold">Cognome</span></div>
                    <div class="col"><span class="fw-bold">Etá</span></div>
                    <div class="col"><span class="fw-bold">Genere</span></div>
                </div> -->
            <table class="t-cust" v-if="this.utenti.length>0">
                <tr><th class="text-center">Funzioni</th> <th>Nome</th><th>Cognome</th><th>Etá</th><th>Genere</th></tr>
                <tr v-for="elem in utenti" class=" py-2">
                    <td class="text-center">
                        <span class="action">
                            <a :href="'/main/utente_singolo/'+elem.id_test" class="text-decoration-none"><i class="fas fa-eye"></i></a>
                            <a :href="'/corso/delete_test_on_corso/'+elem.id_test+'/'+corso.id_corsi" class="text-decoration-none ms-2"><i class="fas fa-trash"></i></a>
                        </span>
                    </td>
                    <td>{{elem.nome}}</td>
                    <td>{{elem.cognome}}</td>
                    <td>{{elem.eta}}</td>
                    <td>{{elem.genere}}</td>
                </tr>
            </table>
                <?php 
                    // if(!empty($get[0]->nome)){
                    //     foreach($get as $i){
                    //         echo '<div class="row pt-2 pb-2">';
                    //         echo '<div class="col-4"><span class="action"><a href="/main/utente_singolo/'.$i->id.'" class="text-decoration-none"><i class="fas fa-eye"></i></a>';
                    //         echo '<a href="/corso/delete_test_on_corso/'.$i->id_test.'/'.$i->id_corsi.'" class="text-decoration-none ms-2"><i class="fas fa-trash"></i></a>';
                    //         echo '</span>';
                    //         echo '<span class="ms-3">'.$i->nome.'</span></div>';
                    //         echo '<div class="col-3">'.$i->cognome.'</div>';
                    //         echo '<div class="col">'.$i->eta.'</div>';
                    //         echo '<div class="col">'.$i->genere.'</div>';
                    //         echo '</div>';
                    //     }                                
                    // }              
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
                            
                ?>
                <!-- </ul> -->
            <!-- </div> -->
        </div>
    </div>
</div>