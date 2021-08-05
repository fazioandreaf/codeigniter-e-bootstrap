function init(){
    new Vue({
        el:"#app",
        data:{
            utente:{},
            corsi:[],
            esperienze:[],
        
        },
        mounted(){
            let url=window.location.pathname;
            let index=url.indexOf('/',url.length-5)
            let index_f=url.slice(index+1);
            // // codice di antonio
            // const r= await axios.post('/main/utente_singolo_corsi_json?id='+index_f
            // )
            // const {nome,eta,genere,cognome,id}=r.data[0];
            //     this.utente={nome,eta,genere,cognome,id}

            axios.post('/main/utente_singolo_corsi_json?id='+index_f
            )
                .then(r=>{
                    const {nome,eta,genere,cognome,id_test}=r.data[0];
                    this.utente={nome,eta,genere,cognome,id_test} ;
                    r.data.forEach(elem => {
                        const {titolo,descrizione,id_corsi}=elem;
                        this.corsi.push({titolo,descrizione,id_corsi});
                    });
                })
                .catch(e=>console.log(e))
            axios.post('/main/utente_singolo_exp_json?id='+index_f)
            .then(r=>{
                if(r.data[0].job_title!=undefined){
                    r.data.forEach(elem => {
                        const {job_title,job_description}=elem;
                        this.esperienze.push({job_title,job_description});
                    });
                };
            })
            .catch(r=>console.log(r.data))
        },
        methods:{
        }
    })
};
document.addEventListener("DOMContentLoaded", init)
