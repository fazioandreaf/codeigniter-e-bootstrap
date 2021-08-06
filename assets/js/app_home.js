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
            utenti:[],
            id:0,
            modal:false,
            nome:'',
            search:'',
            order_toggle:true,
            name_toggle:false,
        },
        mounted(){
            axios.post('/main/index_json')
            .then(r=>{
                this.utenti=r.data.sort(this.order_a_b);                
            })
            .catch(e=>console.log(e))    
        },
        methods:{
            log(id,nome){
                this.id=id;
                this.modal=!this.modal;
                console.log(this.modal);
                this.nome=nome;
            },
            order_a_b(a,b){
                if (a.nome < b.nome)
                return -1;
              if (a.nome > b.nome)
                return 1;
              return 0;
            },
            order_b_a(a,b){
                if (a.nome > b.nome)
                return -1;
              if (a.nome < b.nome)
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
            }
        }
    })
};
document.addEventListener("DOMContentLoaded", init)
