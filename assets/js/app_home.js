function init(){
    let collection=document.getElementsByClassName('delete');
    for(let i=0;i<collection.length;i++)
    collection[i].addEventListener("click",toggle);
    function toggle(){
        let id=this.dataset.id;
        let modal=document.getElementById('modal');
        modal.classList.add('show');
        let anchor=document.getElementById('delete_modal');
        anchor.href='/main/delete_test/'+id;
    }
    new Vue({
        el:"#app",
        data:{
            colore:'test',
            utenti:[],
            corsi:[],
            id:0,
            modal:false,
            nome:'',
            search:'',
            order_toggle:true,
            name_toggle:false,
            delete_utente:[],
            test_corso_toggle:true,
        },
        mounted(){
            axios.get('/main/index_json')
            .then(r=>{
                if(r.status=='200')
                    this.utenti=r.data.sort(this.order_a_b);                
            })
            .catch(e=>console.log(e))    
        },
        methods:{ 
            log(id,nome){
                this.id=id;
                this.modal=!this.modal;
                this.nome=nome;
            },
            order_a_b(a,b){
                if (a.nome.toUpperCase() < b.nome.toUpperCase())
                return -1;
              if (a.nome.toUpperCase() > b.nome.toUpperCase())
                return 1;
              return 0;
            },
            order_b_a(a,b){
                if (a.nome.toUpperCase() > b.nome.toUpperCase())
                return -1;
              if (a.nome.toUpperCase() < b.nome.toUpperCase())
                return 1;
              return 0;
            },
            f_order(){
                console.log('ciao');
                this.order_toggle=!this.order_toggle;
                if(this.order_toggle){
                    this.utenti.sort(this.order_a_b)
                }else{
                    this.utenti.sort(this.order_b_a)

                }
            },
            order_a_b_corsi(a,b){
                if (a.titolo.toUpperCase() < b.titolo.toUpperCase())
                return -1;
              if (a.titolo.toUpperCase() > b.titolo.toUpperCase())
                return 1;
              return 0;
            },
            order_b_a_corsi(a,b){
                if (a.titolo.toUpperCase() > b.titolo.toUpperCase())
                return -1;
              if (a.titolo.toUpperCase() < b.titolo.toUpperCase())
                return 1;
              return 0;
            },
            deleteAPI(){
                axios.delete('main/delete_axios/?id='+this.id)
                .then(r=>{if(r.status=='200'){
                    this.delete_utente.push(r.data);
                }})
                .catch(e=>console.log(e))
                this.log(0,'');
            },
            switch_test_corso(){
                this.test_corso_toggle=!this.test_corso_toggle;
                if(this.test_corso_toggle?this.colore='test':this.colore='corso');
                if(this.corsi.length==0){
                    axios.get('/main/corsi_json')
                        .then(r=>{
                            if(r.status=='200')
                                this.corsi=r.data.sort(this.order_a_b_corsi);                
                        })
                        .catch(e=>console.log(e))    
                }
                    
            },
            trigger(){

            }
        }
    })
};
document.addEventListener("DOMContentLoaded", init)
