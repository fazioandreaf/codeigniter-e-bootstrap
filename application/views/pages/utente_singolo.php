<div class="container-fluid">
    <h1>
        Utente singolo

    </h1>
    <div class="container-fluid">
        <ul>
            <li><span class="fst-italic text-capitalize">nome: </span>{{utente.nome}} ;</li>
            <li><span class="fst-italic text-capitalize">cognome: </span>{{utente.cognome}} ;</li>
            <li><span class="fst-italic text-capitalize">eta: </span>{{utente.eta}} ;</li>
            <li><span class="fst-italic text-capitalize">genere: </span>{{utente.genere}} ;</li>
        </ul>
        <div>
            <h2>Corsi iscritti</h2>
            
            <a :href="'/test/test_on_corso/'+utente.id">
                <button type="button" style="border:none" class="btn btn-primary corso">
                    Inserimento nuovo  corso
                </button>                    
            </a>    
            </div> 
            <table class="t-cust" v-if="this.corsi.length>0">
                <tr> <th>Funzioni</th><th>Titolo</th><th>Descrizione</th></tr>
                <tr v-for="elem in corsi" class=" py-2">
                    <td class="text-center">
                        <a :href="'/test/delete_corsi_on_test/'+utente.id_test+'/'+elem.id_corsi" style="color:var(--bs-danger)" class="me-2"> 
                            
							<i class="fas fa-trash"></i>
                        </a>
						<a :href="'/test/certificato_corso/'+utente.id_test+'/'+elem.id_corsi">
						<i class="fas fa-file"></i>
						</a>
                        <!-- </a> -->
                    </td>
                    <td>{{elem.titolo}}</td>
                    <td>{{elem.descrizione}}</td></tr>
            </table>

            <h2>Esperienze lavorative
                </h2>
            <a :href="'/job/add/'+utente.id_test">
                <button type="button" style="border:none" class="btn btn-primary exp">
                    Inserimento esperienze
                </button>
                </a>
            <table class="t-cust" v-if="this.esperienze.length>0">
                <tr> <th>Funzioni</th><th>Esperienza</th><th>Descrizione</th></tr>
                <tr v-for="elem in esperienze" class=" py-2">
                    <td class="text-center">
                    <a :href="'/job/add/'+utente.id_test+'/'+elem.id" style="color:var(--bs-info)"><i class="fas fa-edit"></i></a>
                        <a href="/job/delete/'.$i->id_test.'/'.$i->id.'" style="color:var(--bs-danger)" class="me-2">  <i class="fas fa-trash"></i></a>
                        </td>
                    <td>{{elem.job_title}} </td>
                    <td>{{elem.job_description}}</td></tr>
            </table>
            <!-- <div class="pt-4 pb-5 mb-5 t-cust d-flex align-items-center flex-column">
                <div class="row py-2 utente_singolo">
                    <div class="col-4"><span class="fw-bold text-center">Funzioni</span></div>
                    <div class="col-8"><span class="fw-bold">Titolo del lavoro</span></div>
                </div> -->
                <?php 
                    // if(!empty($get_exp[0]->job_title)){
                    //     foreach($get_exp as $i){
                    //         echo '<div class="row py-2 utente_singolo" >';
                    //         echo '<div class="col-4 text-center"><a href="/job/add/'.$i->id_test.'/'.$i->id.'" style="color:var(--bs-info)"><i class="fas fa-edit"></i></a>';
                    //         echo '<a href="/job/delete/'.$i->id_test.'/'.$i->id.'" style="color:var(--bs-danger)" class="me-2">  <i class="fas fa-trash"></i></a></div>';
                    //         echo '<div class="col-8">'.$i->job_title.'</div>';
                    //         echo '</div>';
                    //     }                                
                    // }      
                    // if(!empty($get_exp[0]->job_title)){
                    //     foreach($get_exp as $i){
                    //         echo '<li><a href="/job/add/'.$i->id_test.'/'.$i->id.'" style="color:var(--bs-info)"><i class="fas fa-edit"></i></a>';
                    //         echo '<a href="/job/delete/'.$i->id_test.'/'.$i->id.'" style="color:var(--bs-danger)" class="me-2">  <i class="fas fa-trash"></i></a>'.($i->job_title).'</li>';
                    //     }
                    // }else{
                    //     echo '<li> Non hai ancora nessuna esperienza lavorativa</li>';
                    // }
                ?>
            <!-- </div> -->

            

            
        </div>
    </div>
</div>
