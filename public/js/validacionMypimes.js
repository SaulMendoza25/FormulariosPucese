

const textMypimes = document.querySelector("#textMypimes");
const formacionManager= document.querySelector("#Formation_of_manager");
const textCategory= document.querySelector("#textCategory");
const Category= document.querySelector("#Category");
const textGender=document.querySelector("#textGender");
const gender=document.querySelector("#Gender_Representative");
const others=document.querySelector("#others");
const others2=document.querySelector("#others2");
const labelOther=document.querySelector("#labelOther");
const labelespecialidad=document.querySelector("#labelespcialidad");
//guardar cambios  al momento de realizar un submit
const guardar=document.querySelector("#save");
//tratado comercial
const  textComercio =document.querySelector("#text_Fair_trade_products");
const  subtmitComercio =document.querySelector("#Fair_trade_products");
//paises 
const textPaises= document.querySelector("#textPaises");
const submtCountry1= document.querySelector("#countrys1");
const submtCountry2= document.querySelector("#countrys2");
const submtCountry3= document.querySelector("#countrys3");
const submtCountry4= document.querySelector("#countrys4");
//agregar countrys
const importaciones= document.querySelector("#importaciones");
const exportaciones= document.querySelector("#exportacion");
const validacion_paises=document.querySelector("#validacion_de_Paises");
//validacion de servicios y porductos 
const selectServicios=document.querySelector("#Products_or_services");
const selectServiciosHidden=document.querySelector("#Products_or_services_details");


guardar.addEventListener('click',save);
textMypimes.addEventListener('change',cambiar);
textPaises.addEventListener('change',countrys);
function countrys(){
    if(textPaises.value=="SI"){
        submtCountry1.style.display="initial";
        submtCountry2.style.display="initial";
        submtCountry3.style.display="initial";
        submtCountry4.style.display="initial";
    }else{
        submtCountry1.style.display="none";
        submtCountry2.style.display="none";
        submtCountry3.style.display="none";
        submtCountry4.style.display="none";
        submtCountry2.value="";
        submtCountry4.value="";
    }
}


console.log(selectServiciosHidden.value);
function save(){

   validacion_paises.value=textPaises.value;
   formacionManager.value= textMypimes.value;
   Category.value= textCategory.value;
   gender.value= textGender.value;
   subtmitComercio.value=textComercio.value;
   importaciones.value=submtCountry2.value;
   exportaciones.value=submtCountry4.value;
   selectServiciosHidden.value=selectServicios.value;
  
}
function cambiar(){
    if(textMypimes.value=="Estudiante Universitario"){
        others.style.display="initial";
        others2.style.display="initial";
        labelOther.style.display="initial";
        labelespecialidad.style.display="initial";
    }else{

        others.style.display="none";
        others2.style.display="none";
        labelOther.style.display="none";
        labelespecialidad.style.display="none";
        others.value="";
        others2.value="";
    }
}

