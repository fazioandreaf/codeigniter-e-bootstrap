function init(){
    new Vue({
        el:"#app",
        data:{
            colore:'test',
            utente:{},
            corsi:[],
            esperienze:[],
			test_corso_toggle:true,
			switch_test_corso :true,
        
        },
        mounted(){
            let url=window.location.pathname;
            let index=url.indexOf('/',url.length-5)
            let id=url.slice(index+1);
			axios.get('/main/utente_singolo_json?id='+id)
				.then(r=>{
					const {nome,eta,genere,cognome,id}=r.data[0];
					this.utente={nome,eta,genere,cognome,id} ;
				})
				.catch(r=>console.log(r.data));
			
            axios.get('/main/utente_singolo_corsi_json?id='+id)
                .then(r=>{
                    r.data.forEach(elem => {
                        const {titolo,descrizione,id_corsi}=elem;
                        this.corsi.push({titolo,descrizione,id_corsi});
                    });
                })
                .catch(e=>console.log(e));
            axios.get('/main/utente_singolo_exp_json?id='+id)
            .then(r=>{
                if(r.data[0].job_title!=undefined){
                    r.data.forEach(elem => {
                        const {job_title,job_description,id}=elem;
                        this.esperienze.push({job_title,job_description,id});
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
