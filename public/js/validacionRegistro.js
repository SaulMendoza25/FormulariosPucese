const tipo_registro = document.querySelector("#tipo_registro");
const boton = document.querySelector('#btn');
const registro= document.querySelector('#tipo_usuario');
const formulario = document.querySelector("#form");
console.log(registro.value);

boton.addEventListener('click',btnOnclick);
function btnOnclick(){

    registro.value=tipo_registro.value;
 
}

