<div class="left">
  <label for="RUC">RUC:</label>
  <input type="text" name="RUC" class="form-control" id="RUC" value="{{isset($mypimes->RUC)?$mypimes->RUC:''}}">
  <label for="Business_name">Razon Social:</label>
  <input type="text" name="Business_name" class="form-control" id="Business_name" value="{{isset($mypimes->Business_name)?$mypimes->Business_name:''}}">
  <label for="Trade_name">Nombre Comercial:</label>
  <input type="text" name="Trade_name" class="form-control" id="Trade_name" value="{{isset($mypimes->Trade_name)?$mypimes->Trade_name:''}}">
  <label for="Number_of_collaborators">Numeros de Colaboradores:</label>
  <input type="text" name="Number_of_collaborators" class="form-control" id="Number_of_collaborators" value="{{isset($mypimes->Number_of_collaborators)?$mypimes->Number_of_collaborators:''}}">
  <label for="Formation_of_manager">Formación del gerente o administrador:</label>
  <select class="combo" name="Formation_of_manager" onChange="combo(this, 'demo')" id="Formation_of_manager" value="{{isset($mypimes->Formation_of_manager)?$mypimes->Formation_of_manager:''}}">
    <option value="Primaria">Primaria</option>
    <option value="Secundaria">Secundaria</option>
    <option value="Tercer Nivel">Tercer Nivel</option>
    <option value="Maestria">Maestria</option>
    <option value="Doctorado">Doctorado</option>
  </select>
  <label for="Address">Direccion:</label>
  <input type="text" name="Address" class="form-control" id="Address" value="{{isset($mypimes->Address)?$mypimes->Address:''}}">
  <label for="email">Correo Electronico:</label>
  <input type="text" name="email" class="form-control" id="email" value="{{isset($mypimes->E_mail_address)?$mypimes->E_mail_address:''}}">
</div>
<div class="right1">
  <label for="Province">Provincia:</label>
  <input type="text" name="Province" class="form-control" id="Province" value="{{isset($mypimes->Province)?$mypimes->Province:''}}"> 
  <label for="County">Canton:</label>
  <input type="text" name="County" class="form-control" id="County" value="{{isset($mypimes->County)?$mypimes->County:''}}">
  <label for="Parish">Parroquia:</label>
  <input type="text" name="Parish" class="form-control" id="Parish" value="{{isset($mypimes->Parish)?$mypimes->Parish:''}}">
  <label for="Contact_telephone_number">Telefono de contactos:</label>
  <input type="text" name="Contact telephone_number" class="form-control" id="Contact_telephone_number" value="{{isset($mypimes->Contact_telephone_number)?$mypimes->Contact_telephone_number:''}}">
  <label for="Owner_Legal_representative">Titular/Representante legal:</label>
  <input type="text" name="Owner_Legal_representative" class="form-control" id="Owner_Legal_representative" value="{{isset($mypimes->Owner_Legal_representative)?$mypimes->Owner_Legal_representative:''}}">
  <label for="Gender_Representative">Genero Representante:</label>
  <select class="combo" name="Gender_Representative" onChange="combo(this, 'demo')" id="Gender_Representative" value="{{isset($mypimes->Gender_Representative)?$mypimes->Gender_Representative:''}}">
    <option value="Masculino">Masculino</option>
    <option value="Femenino">Femenino</option>
  </select>
</div>
<div class="left">
  <h1 class="subtitle">Actividad Comercial y Categorías</h1>
  <label for="logo">Logo: (opcional)</label>
  <select class="combo" name="logo" onChange="combo(this, 'demo')" id="logo" value="{{isset($mypimes->logo)?$mypimes->logo:''}}">
    <option value="SI">SI</option>
    <option value="NO">NO</option>
  </select>
  <img src="{{isset($mypimes)?asset('storage'). '/' . $mypimes->up_image_logo:''}}" alt="">
  
  <input type="file" name="up_image_logo" accept="image/png, image/jpeg" class="comment" id="up_image_logo" value="{{isset($mypimes->up_image_logo)?$mypimes->up_image_logo:''}}">
  <label for="Number_of_establishments">Numeros de establecimientos:</label>
  <input type="text" name="Number_of_establishments" class="form-control" id="Number_of_establishments" value="{{isset($mypimes->Number_of_establishments)?$mypimes->Number_of_establishments:''}}">
  <label for="Business_start_date">Fecha de inicio del negocio:</label>
  <input type="date" min="1900-01-01" max="2150-01-01" name="Business_start_date" class="form-control" id="start_date" value="{{isset($mypimes->Business_start_date)?$mypimes->Business_start_date:''}}">
  <label for="Category">Categoria:</label>
  <select class="combo" name="Category" onChange="combo(this, 'demo')" id="Category" value="{{isset($mypimes->Category)?$mypimes->Category:''}}">
    <option value="Comercio">Comercio</option>
    <option value="Servicio">Servicio</option>
    <option value="Industrias">Industrias</option>
    <option value="Artesanias">Artesanias</option>
    <option value="Otros">Otros</option>
  </select>
</div>

<div class="right">
  <label class="Products_or_services_details" for="Products_or_services_details">Productos o servicios:</label>
  <input type="text" name="Products_or_services_details" class="form-control" id="Products_or_services_details" value="{{isset($mypimes->Products_or_services_details)?$mypimes->Products_or_services_details:''}}">

  <label for="Fair_trade_products">Producto de comercio justo:</label>
  <select class="combo" name="Fair_trade_products" onChange="combo(this, 'demo')" id="Fair_trade_products" value="{{isset($mypimes->Fair_trade_products)?$mypimes->Fair_trade_products:''}}">
    <option value="SI">SI</option>
    <option value="NO">NO</option>
  </select>
  <label for="Foreign_trade">Comercio exterior:</label>
  <select class="combo" name="Foreign_trade" onChange="combo(this, 'demo')" id="Foreign_trade" value="{{isset($mypimes->Foreign_trade)?$mypimes->Foreign_trade:''}}">
    <option value="SI">SI</option>
    <option value="NO">NO</option>
  </select>
</div>
<div class="left">
  <h1 class="subtitle">Localización georeferenciada</h1>
  <label for="Coordinates">Cordenadas: (opcional)</label>
  <input type="text" name="Coordinates" class="form-control" id="Coordinates" value="{{isset($mypimes->Coordinates)?$mypimes->Coordinates:''}}">
</div>
<div class="right1">
  <label class="espacio" for="image">Imagen: (opcional)</label>
  <input type="file" name="image" accept="image/png, image/jpeg" class="comment" id="image" value="{{isset($mypimes->image)?$mypimes->image:''}}">
  <img src="{{isset($mypimes)?asset('storage'). '/' . $mypimes->image:''}}" alt="">

</div>
<div class="left">
  <h1 class="subtitle">Información Tecnológica</h1>
  <label for="E_commerce">Comercio Electrónico:</label>
  <input type="text" name="E_commerce" class="form-control" id="E_commerce" value="{{isset($mypimes->E_commerce)?$mypimes->E_commerce:''}}">
  <label for="Requires_training">Requiere Capacitaciones:(opcional)</label>
  <input type="text" name="Requires_training" class="form-control" id="Requires_training" value="{{isset($mypimes->Requires_training)?$mypimes->Requires_training:''}}">
  <label for="Web_page">Página web:(opcional)</label>
  <input type="text" name="Web_page" class="form-control" id="Web_page" value="{{isset($mypimes->Web_page)?$mypimes->Web_page:''}}">
</div>
<div class="right">
  <label class="social_media" for="social_media">Redes Sociales: (opcional)</label>
  <input type="text" name="social_media" class="form-control" id="social_media" value="{{isset($mypimes->social_media)?$mypimes->social_media:''}}">
  <label for="Whatsapp">Whatsapp:</label>
  <input type="text" name="Whatsapp" class="form-control" id="Whatsapp" value="{{isset($mypimes->Whatsapp)?$mypimes->Whatsapp:''}}">
  <div class="buttons">
  <input class="second-button" type="submit" value="Guardar Datos">
  <a href="{{url('emprendimiento/')}}"  class="second-button">Volver</a>
  </div>
</div>
