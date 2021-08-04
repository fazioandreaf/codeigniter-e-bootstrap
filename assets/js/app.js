function init(){
    let collection=document.getElementsByClassName('delete');
    for(let i=0;i<collection.length;i++)
    collection[i].addEventListener("click",toggle)
        
    function toggle(e){
        let id=this.dataset.id;
        let modal=document.getElementById('modal');
        modal.classList.add('show');
        let anchor=document.getElementById('delete_modal');
        anchor.href='/main/delete_test/'+id;
    }
};
document.addEventListener("DOMContentLoaded", init())