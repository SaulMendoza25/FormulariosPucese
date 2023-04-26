
<div class="left">
  <label for="RUC">(Opcional) RUC:</label>
  <input type="text" name="RUC" class="form-control" id="RUC"  pattern="[0-9]{13}" title="Ingrese datos validos en el campo" value="{{isset($mypimes->RUC)?$mypimes->RUC:' '}}" pattern="[0-9]{1,15}" >
  <label for="Business_name">Razon Social:</label>
  <input type="text" name="Business_name" class="form-control"  pattern="[a-zA-Z ]{2,999}" title="Ingrese datos validos en el campo" id="Business_name" value="{{isset($mypimes->Business_name)?$mypimes->Business_name:' '}}">
  <label for="Trade_name">Nombre Comercial:</label>
  <input type="text" name="Trade_name" class="form-control" pattern="[a-zA-Z ]{2,999}" title="Ingrese datos validos en el campo" id="Trade_name" value="{{isset($mypimes->Trade_name)?$mypimes->Trade_name:' '}}">
  <label for="Number_of_collaborators">Numeros de Colaboradores:</label>
  <input type="number" name="Number_of_collaborators" class="form-control" id="Number_of_collaborators" min="1" title="Ingrese datos validos en el campo"  value="{{isset($mypimes->Number_of_collaborators)?$mypimes->Number_of_collaborators:' '}}">
  <label for="Formation_of_manager">Formación del gerente o administrador:</label>
  <select class="combo"  id="textMypimes">
  <option value="{{isset($mypimes->Formation_of_manager)?$mypimes->Formation_of_manager:' '}}" selected disabled hidden>{{isset($mypimes->Formation_of_manager)?$mypimes->Formation_of_manager:' '}}</option>
    <option value="Primaria">Primaria</option>
    <option value="Secundaria">Secundaria</option>
    <option value="Tercer Nivel">Tercer Nivel</option>
    <option value="Maestria">Maestria</option>
    <option value="Doctorado">Doctorado</option>
    <option value="Estudiante Universitario">Estudiante Universitario</option>
  </select>
  <input type="hidden"  id="Formation_of_manager" name="Formation_of_manager"   pattern="[a-zA-Z ]{2,999}" title="Ingrese datos validos en el campo">
  <label id="labelOther"  Style="display:none" for="others">Ingrese el nombre de la universidad</label>
  <input type="text" name="Name_University" id="others" class="form-control" Style="display:none" value="{{isset($mypimes->Name_University)?$mypimes->Name_University:' '}}">
  <label id ="labelespcialidad"  Style="display:none" for="others2">Ingrese la Especialidad</label>
  <input type="text" id="others2" name="especialidad" class="form-control" Style="display:none" value="{{isset($mypimes->especialidad)?$mypimes->especialidad:' '}}">
  <label for="Address">Dirección:</label>
  <input type="text" name="Address" class="form-control" id="Address" value="{{isset($mypimes->Address)?$mypimes->Address:' '}}"   pattern="[a-zA-Z1-9 ]{2,999}" title="Ingrese datos validos en el campo">
</div>
<div class="right1">
  <label for="Province">Provincia:</label>
  <input type="text" name="Province" class="form-control" id="Province" value="{{isset($mypimes->Province)?$mypimes->Province:' '}}"   pattern="[a-zA-Z ]{2,999}" title="Ingrese datos validos en el campo"> 
  <label for="County">Canton:</label>
  <input type="text" name="County" class="form-control" id="County" value="{{isset($mypimes->County)?$mypimes->County:' '}}"   pattern="[a-zA-Z ]{2,999}" title="Ingrese datos validos en el campo">
  <label for="Parish">Parroquia:</label>
  <input type="text" name="Parish" class="form-control" id="Parish" value="{{isset($mypimes->Parish)?$mypimes->Parish:' '}}"   pattern="[a-zA-Z ]{2,999}" title="Ingrese datos validos en el campo">
  <label for="Contact_telephone_number">Telefono de contactos:</label>
  <input type="text" name="Contact telephone_number" class="form-control" id="Contact_telephone_number" value="{{isset($mypimes->Contact_telephone_number)?$mypimes->Contact_telephone_number:' '}}"   pattern="[0-9]{1,13}" title="Ingrese datos validos en el campo" >
  <label for="Owner_Legal_representative">Titular/Representante legal:</label>
  <input type="text" name="Owner_Legal_representative" class="form-control" id="Owner_Legal_representative" value="{{isset($mypimes->Owner_Legal_representative)?$mypimes->Owner_Legal_representative:' '}}"   pattern="[a-zA-Z ]{2,999}" title="Ingrese datos validos en el campo">
  <label for="Gender_Representative">Genero Representante:</label>
  <select class="combo" id="textGender" value="{{isset($mypimes->Gender_Representative)?$mypimes->Gender_Representative:' '}}">
    <option value="{{isset($mypimes->Gender_Representative)?$mypimes->Gender_Representative:' '}}" selected disabled hidden  pattern="[a-zA-Z ]{2,999}">{{isset($mypimes->Gender_Representative)?$mypimes->Gender_Representative:' '}}</option>
    <option value="masculino">Masculino</option>
    <option value="femenino">Femenino</option>
  </select>
  <input type="hidden"  id="Gender_Representative" name="Gender_Representative">
</div>



<div class="left">
  <h1 class="subtitle">Actividad Comercial y Categorías</h1>
  <label for="logo">(Opcional) Logo:</label>
  <img src="{{isset($mypimes)?asset('storage'). '/' . $mypimes->up_image_logo:' '}}" alt="">
  
  <input type="file" name="up_image_logo" accept="image/png, image/jpeg" class="comment" id="up_image_logo" value="{{isset($mypimes->up_image_logo)?$mypimes->up_image_logo:' '}}" >
  <label for="Number_of_establishments">Numeros de establecimientos:</label>
  <input type="number" min="1" name="Number_of_establishments" class="form-control" id="Number_of_establishments" value="{{isset($mypimes->Number_of_establishments)?$mypimes->Number_of_establishments:' '}}"  title="Ingrese datos validos en el campo" >
  <label for="Business_start_date">Fecha de inicio del negocio:</label>
  <input type="date" min="1900-01-01" max="2150-01-01" name="Business_start_date" class="form-control" id="start_date" value="{{isset($mypimes->Business_start_date)?$mypimes->Business_start_date:' '}}"  pattern="[a-zA-Z ]{2,999}">
  <label for="Category">Categoria:</label>
  <select class="combo"   id="textCategory">
  <option value="{{isset($mypimes->Category)?$mypimes->Category:' '}}" selected disabled hidden  pattern="[a-zA-Z ]{2,999}">{{isset($mypimes->Category)?$mypimes->Category:' '}}</option>
    <option value="Comercio">Comercio</option>
    <option value="Servicio">Servicio</option>
    <option value="Industrias">Industrias</option>
    <option value="Artesanias">Artesanias</option>
    <option value="Otros">Otros</option>
  </select>
  <input type="hidden"  name="Category" id="Category">

</div>

<div class="right">
  <label class="Products_or_services_details" for="Products_or_services_details">Productos o servicios:</label>
  <input type="text" name="Products_or_services_details" class="form-control" id="Products_or_services_details" value="{{isset($mypimes->Products_or_services_details)?$mypimes->Products_or_services_details:' '}}"   pattern="[a-zA-Z ]{2,999}" title="Ingrese datos validos en el campo">

  <label for="Fair_trade_products">(opcional) Producto de comercio justo:</label>
  <select class="combo"   id="text_Fair_trade_products" value="{{isset($mypimes->Fair_trade_products)?$mypimes->Fair_trade_products:' '}}">
    <option value="SI">SI</option>
    <option value="NO">NO</option>
  </select>
  <input type="hidden"  name="Fair_trade_products" id="Fair_trade_products">
  <label for="Foreign_trade">(opcional) Comercio exterior:</label>
  
  <select class="combo"  id="textPaises">
  <option value="{{isset($mypimes->validacion_de_Paises)?$mypimes->validacion_de_Paises:'NO'}}" selected disabled hidden>{{isset($mypimes->validacion_de_Paises)?$mypimes->validacion_de_Paises:' '}}</option>
    <option value="SI">SI</option>
    <option value="NO">NO</option>
  </select>
  
<input type="hidden"  id="validacion_de_Paises" name="validacion_de_Paises">
   @include('mipyme.countrys')
</div>
<div class="left">
  <h1 class="subtitle">Localización georeferenciada</h1>
  <label for="Coordinates">Cordenadas: </label>
  <input type="text" name="Coordinates" class="form-control" id="Coordinates" value="{{isset($mypimes->Coordinates)?$mypimes->Coordinates:' '}}"  pattern="[a-zA-Z ]{2,999}"  title="Ingrese datos validos en el campo">
</div>
<div class="right1">
  <label class="espacio" for="image">Imagen:</label>
  <input type="file" name="image" accept="image/png, image/jpeg" class="comment" id="image" value="{{isset($mypimes->image)?$mypimes->image:' '}}" title="Ingrese datos validos en el campo">
  <img src="{{isset($mypimes)?asset('storage'). '/' . $mypimes->image:' '}}" alt="">
</div>


<div class="left">
  <h1 class="subtitle">Información Tecnológica</h1>
  <label for="E_commerce">(opcional) Comercio Electrónico:</label>
  <input placeholder="Escriba la dirección"type="text" name="E_commerce" class="form-control" id="E_commerce" value="{{isset($mypimes->E_commerce)?$mypimes->E_commerce:' '}}">
  <label for="Requires_training">(opcional) Requiere Capacitaciones:</label>
  <input  placeholder="Escriba los temas" type="text" name="Requires_training" class="form-control" id="Requires_training" value="{{isset($mypimes->Requires_training)?$mypimes->Requires_training:' '}}">
  <label for="Web_page">(opcional) Página web:</label>
  <input placeholder="Escriba la dirección" type="text" name="Web_page" class="form-control" id="Web_page" value="{{isset($mypimes->Web_page)?$mypimes->Web_page:' '}}">
</div>
<div class="right">
  <label class="social_media" for="social_media">(opcional) Redes Sociales</label>
  <input placeholder="Escriba la dirección" type="text" name="social_media" class="form-control" id="social_media" value="{{isset($mypimes->social_media)?$mypimes->social_media:' '}}">
  <label for="Whatsapp">(opcional) Whatsapp:</label>
  <input placeholder="Escriba la dirección"  type="text" name="Whatsapp" class="form-control" id="Whatsapp" value="{{isset($mypimes->Whatsapp)?$mypimes->Whatsapp:' '}}">
  <div class="buttons">
  <input class="second-button" id="save" type="submit" value="Guardar Datos">
  <a href="{{ url('login') }}"  class="second-button">Cerrar Sesion</a>
  </div>
  
</div>
<script src="https://form.deone.com.ec/public/js/validacionMypimes.js"></script>
