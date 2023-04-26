const textProductos= document.querySelector('#textproducts');
const submitProductos= document.querySelector('#main_products');
const textServicios= document.querySelector('#textservice');
const submitServicios=document.querySelector('#main_service');
const agregar = document.querySelector("#save");
const texTopic=document.querySelector("#texTopic");
const theme_require=document.querySelector("#theme_require_trainings");

agregar.addEventListener('click',save);
function save(){
    submitProductos.value=textProductos.value;
    submitServicios.value=textServicios.value;
    theme_require.value=texTopic.value;
}


