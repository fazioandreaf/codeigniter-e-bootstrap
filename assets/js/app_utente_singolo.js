function init(){
    new Vue({
        el:"#app",
        data:{
            utente:{nome:""},
            corsi:[],
            esperienze:[],
        
        },
        mounted(){
            let url=window.location.pathname;
            let index=url.indexOf('/',url.length-5)
            let index_f=url.slice(index+1);
            // // codice di antonio
            // const r= await axios.post('/main/utente_singolo_json?id='+index_f
            // )
            // const {nome,eta,genere,cognome,id}=r.data[0];
            //     this.utente={nome,eta,genere,cognome,id}

            axios.post('/main/utente_singolo_json?id='+index_f
            )
                .then(r=>{
                    // console.log(r.data[0]);
                    for( const key in r.data[0]){
                        if(key=='nome'||key=='cognome'||key=='eta'||key=='genere')
                        this.utente[key]=r.data[0][key]
                    }
                    console.log(this.utente);
                })
                .catch(e=>console.log(e))
            console.log('ciaoo');
        },
        methods:{
        }
    })
};
document.addEventListener("DOMContentLoaded", init)
