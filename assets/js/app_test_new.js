function init(){
    new Vue({
        el:"#app",
        data:{
            eta:20,
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
