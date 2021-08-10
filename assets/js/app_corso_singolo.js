function init(){
    new Vue({
        el:"#app",
        data:{
            colore:'corso',
            utenti:[],
            corso:{},
            id:0,
            nome:'',
        },
        mounted(){
            let url=window.location.pathname;
            let index=url.indexOf('/',url.length-5)
            let id=url.slice(index+1);
            axios.post('/main/corso_singolo_json?id_corsi='+id)
            .then(r=>{
                const {id_corsi,titolo,descrizione}=r.data[0];
                this.corso={id_corsi,titolo,descrizione};
                r.data.forEach(elem => {
                    const {id_test,nome,cognome,eta,genere}=elem;
                    this.utenti.push({id_test,nome,cognome,eta,genere});                    
                });
            })
            .catch(e=>console.log(e)) 
        },
        methods:{
            
        }
    })
};
document.addEventListener("DOMContentLoaded", init)
