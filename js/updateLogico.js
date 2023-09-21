function confirmar(){
    let res = confirm("¿Deseas eliminar este dato?");

    if(res === true){
        return true;
    }else{
        return false;
    }
}