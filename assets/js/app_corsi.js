function init(){
    new Vue({
        el:"#app",
        data:{
            colore:'test',
            corsi:[],
            id:0,
			test_corso_toggle:false,
            nome:'',
        },
        mounted(){
            axios.post('/main/corsi_json')
            .then(r=>{
                this.corsi=r.data.sort(this.order_a_b);
            })
            .catch(e=>console.log(e))    
        },
        methods:{
            order_a_b(a,b){
                if (a.titolo.toUpperCase() < b.titolo.toUpperCase())
                return -1;
              if (a.titolo.toUpperCase() > b.titolo.toUpperCase())
                return 1;
              return 0;
            },
            order_b_a(a,b){
                if (a.titolo.toUpperCase() > b.titolo.toUpperCase())
                return -1;
              if (a.titolo.toUpperCase() < b.titolo.toUpperCase())
                return 1;
              return 0;
            },
            f_order(){
                console.log('ciao');
                this.order_toggle=!this.order_toggle;
                if(this.order_toggle){
                    this.corsi.sort(this.order_a_b)
                }else{
                    this.corsi.sort(this.order_b_a)

                }
            },
        }
    })
};
document.addEventListener("DOMContentLoaded", init)
