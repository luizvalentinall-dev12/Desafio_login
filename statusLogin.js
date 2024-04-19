function retornoStatus(){
    let retorno = document.querySelector('#retorno');
    retorno.textContent = 'Usuario invalido';

}
let inSubmit = document.querySelector('#submit');
inSubmit.addEventListener("click", retornoStatus());
