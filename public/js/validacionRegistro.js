const tipo_registro = document.querySelector("#tipo_registro");
const boton = document.querySelector('#btn');
const registro= document.querySelector('#register');
const formulario = document.querySelector("#form");
console.log(registro.value);

boton.addEventListener('click',btnOnclick);
function btnOnclick(){
    const selectedValues = [].filter
    .call(tipo_registro.options, option => option.selected)
    .map(option => option.text);
    registro.value=selectedValues;
 
}

