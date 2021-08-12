function init(){
    new Vue({
        el:"#app",
        data:{
            colore:'test',
            nome:'',
            cognome:'', 
            genere:'',
            eta:0,
			test_corso_toggle:true,
			switch_test_corso:true,
        
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
                axios.post('')
            }
        }
    })
};
document.addEventListener("DOMContentLoaded", init)
