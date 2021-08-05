function init(){
    new Vue({
        el:"#app",
        data:{
            corsi:[],
            id:0,
            modal:false,
            nome:'',
        },
        mounted(){
            axios.post('/main/corsi_json')
            .then(r=>{
                this.corsi=r.data;
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
