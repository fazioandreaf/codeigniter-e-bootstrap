<div class="container-fluid">
   <h1 v-if="test_corso_toggle" class="border-bottom border-dark pt-4 pb-4">Corsisti</h1>
   <h1 v-else class="border-bottom border-dark pt-4 pb-4">Corsi</h1>
   <a href="/main/form">
   <button type="button" :class="colore" class="btn">
       Inserimento nuovo 
       <span v-if="test_corso_toggle">utente</span> 
       <span v-else>corso</span> 
    </button>
    </a>
    <div class="form-floating my-3">
        <input v-model="search" type="text" name="search" class="form-control" id="" style="width:auto">
        <label class="floatingTextarea2">Ricerca</label>
    </div>
            <div v-if="test_corso_toggle">
                <table class="t-cust" >
                    <tr><th class="text-center">Funzioni</th>
                    <th  @click="f_order()">
                        Nome
                         <span v-if="name_toggle">
                            <i v-if="!order_toggle" class="fas fa-chevron-down"></i>
                            <i v-else class="fas fa-chevron-up"></i>
                        </span>
                    </th>
                    <th>Cognome</th><th>Etá</th><th>Genere</th></tr>
                    <tr v-for="elem in utenti" class="py-3">
                        <td class="text-center py-3" width="130px">
                            <span class="action">
                                <a :href="'/main/utente_singolo/'+elem.id" class="text-decoration-none"><i class="fas fa-eye"></i></a>
                                <a :href="'/main/edit/'+elem.id"><i class="fas fa-edit"></i></a>
                                <a href="#" @click="log(elem.id,elem.nome)" class="delete"><i class="fas fa-user-minus"></i></a>
                            </span>                       
                        </td>
                        <td>{{elem.nome}}</td>
                        <td>{{elem.cognome}}</td>
                        <td>{{elem.eta}}</td>
                        <td>{{elem.genere}}</td>
                    </tr>
                </table>
            </div>
                ?>
    <div v-else>
        <table class="t-cust" >
            <tr><th>Funzioni</th><th>Titolo</th><th>Descrizione</th></tr>
            <tr v-for="elem in corsi" class="py-3">
                <td class="text-center p-2">
                    <a :href="'/main/corso_singolo/'+elem.id" class="text-decoration-none action"><i class="fas fa-eye"></i></a>
                </td>
                <td>{{elem.titolo}}</td>
                <td>{{elem.descrizione}}</td>
            </tr>
        </table>
    </div>
        <div class="modal fade show" v-if="modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> Eliminazione </h5>
                <button type="button" @click="log(0,'')" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Sicuro che vuoi eliminare il corsista<span class="fst-italic"> {{nome}}</span> ? 
            </div>
            <div class="modal-footer">
                <a href="ciaooo:void(0);">
                    <button type="button" class="btn btn-secondary"  @click="log(0,'')" data-bs-dismiss="modal">Chiudi</button>
                </a> 
                <a id="delete_modal" href="#" @click="deleteAPI()">
                <button type="button" class="btn btn-danger">
                       Elimina
                    </button>
                </a>
            </div>
            </div>
        </div>
    </div>
    <div v-else></div>
</div>
