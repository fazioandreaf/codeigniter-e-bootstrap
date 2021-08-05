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
        },
        mounted(){
            axios.post('/main/index_json')
            .then(r=>{
                this.utenti=r.data;
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

        }
    })
};
document.addEventListener("DOMContentLoaded", init)
