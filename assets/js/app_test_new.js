function init(){
    new Vue({
        el:"#app",
        data:{
            nome:'',
            cognome:'', 
            genere:'',
            eta:0,
        
        },
        computed:{
            form_toggle:function(){
                if(this.nome!='' && this.cognome!='' && this.eta!=0 )
                return false;
                    else 
                    return true;
            }
        },
        methods:{
            post:function(){
                console.log('ciaooo')
            }
        }
    })
};
document.addEventListener("DOMContentLoaded", init)
