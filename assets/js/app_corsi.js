function init(){
    new Vue({
        el:"#app",
        data:{
            corsi:[],
            id:0,
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
        }
    })
};
document.addEventListener("DOMContentLoaded", init)
