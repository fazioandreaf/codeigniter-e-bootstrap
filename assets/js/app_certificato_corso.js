function init(){
    new Vue({
        el:"#app",
        data:{
            colore:'test',
            utente:{},
            corso:{},
            esperienze:[],
			test_corso_toggle:true,
			switch_test_corso :true,
        
        },
        mounted(){
            let url=window.location.pathname;
            let id_middle=url.slice(url.indexOf('/',url.length-10)+1);
			let index_middle=id_middle.indexOf('/');
			let id_corso=id_middle.slice(index_middle+1);
			let id_test=id_middle.slice(0,index_middle);
            axios.get('/test/test_singolo_json?id='+id_test)
                .then(r=>{
                    const {nome,eta,genere,cognome,id}=r.data[0];
                    this.utente={nome,eta,genere,cognome,id} ;
                })
                .catch(e=>console.log(e));
            axios.get('/corso/corso_singolo_json?id='+id_corso)
                .then(r=>{
					console.log(r)
                    const {titolo,descrizione,id}=r.data[0];
                    this.corso={titolo,descrizione,id} ;
                })
                .catch(e=>console.log(e));
				
        },
        methods:{
        }
    })
};
document.addEventListener("DOMContentLoaded", init)
