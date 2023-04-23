const tipo_registro = document.querySelector("#tipo_registro");
const boton = document.querySelector('#btn');
const registro= document.querySelector('#register');
const formulario = document.querySelector("#form");
const btn = document.querySelector("#btn");
const url = "https://form.deone.com.ec/public";
btn.addEventListener('click',backSesion)
function backSesion(){
    return location.replace(url);
}
console.log("hola");
formulario.addEventListener('click',btnOnclick);
function btnOnclick(){
    const selectedValues = [].filter
    .call(tipo_registro.options, option => option.selected)
    .map(option => option.text);
    registro.value=selectedValues;
 
}
console.log(btn);
