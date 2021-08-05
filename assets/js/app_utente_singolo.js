function init(){
    new Vue({
        el:"#app",
        data:{
            utente:[],
        
        },
        mounted(){
            let url=window.location.pathname;
            let index=url.indexOf('/',url.length-5)
            let index_f=url.slice(index+1);
            // console.log();
            axios.post('/main/utente_singolo_json?id='+index_f
            // ,{params:{
            //     id:1,
            // }}
            )
                .then(r=>console.log(r.data))
                .catch(e=>console.log(e))
            console.log('ciaoo');
        },
        methods:{
        }
    })
};
document.addEventListener("DOMContentLoaded", init)
