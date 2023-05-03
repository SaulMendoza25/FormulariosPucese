

<div class="left">
  <label for="name_proyect">Nombre del proyecto:</label>
  <input type="text" name="name_proyect" class="form-control"  pattern="[a-zA-Z ]{1,999}" id="name_proyect" value="{{isset($emprendimiento->name_proyect)?$emprendimiento->name_proyect:old('name_proyect')}}">
  @error('name_proyect')
  <div class=" alert-danger">El nombre del proyecto es requerido</div>
  @enderror
  <label for="name_property">Nombre(s) Propietario(s):</label>
  <input type="text" name="name_property" class="form-control"  pattern="[a-zA-Z ]{1,999}" id="name_property" value="{{isset($emprendimiento->name_property)?$emprendimiento->name_property:old('name_property')}}">
  @error('name_property')
  <div class=" alert-danger">Los Nombre(s) Propietario(s) es requerido</div>
  @enderror
  <label for="addresses">Direccion:</label>
  <input type="text" name="addresses" class="form-control"  pattern="[a-zA-Z1-9 ]{1,999}" id="addresses" value="{{isset($emprendimiento->addresses)?$emprendimiento->addresses:old('addresses')}}">
  @error('addresses')
  <div class=" alert-danger">El nombre de Direccion es requerida</div>
  @enderror
  <label for="phone_number">Telefono:</label>
  <input type="text" NAME="phone_number" class="form-control" pattern="[0-9]{1,13}" id="phone_number" value="{{isset($emprendimiento->phone_number)?$emprendimiento->phone_number:old('phone_number')}}">
  @error('phone_number')
  <div class=" alert-danger">El numero de Telefono es requerido</div>
  @enderror
  <label for="start_date">Fecha de inicio negocio:</label>
  <input type="date" min="2023-01-01" max="2150-01-01" name="start_date" class="form-control" id="start_date" value="{{isset($emprendimiento->start_date)?$emprendimiento->start_date:old('start_date')}}">
  @error('start_date')
  <div class=" alert-danger">La fecha de inicio de negocio es requerido</div>
  @enderror
  <label for="end_date">Fecha de Fin:</label>
  <input type="date" min="2023-01-01" max="2150-01-01" name="end_date" class="form-control" id="end_date" value="{{isset($emprendimiento->end_date)?$emprendimiento->end_date:old('end_date')}}">
  @error('end_date')
  <div class=" alert-danger">La fecha final de negocio es requerida</div>
  @enderror
  <label for="require_trainings">(Opcional) Requiere Capacitaciones:</label>
  <textarea id="texTopic"  class="comment"  placeholder="Ingrese los temas">{{isset($emprendimiento->theme_require_trainings)?$emprendimiento->theme_require_trainings:old('theme_require_trainings')}}</textarea>
  <input type="hidden" name="theme_require_trainings" id="theme_require_trainings">
  
  <label for="upload_proyect">Subir el proyecto (PDF):</label>
  <input type="file" name="upload_proyect" accept="application/pdf" class="form-file" id="upload_proyect" value="{{isset($emprendimiento->upload_proyect)?$emprendimiento->upload_proyect:old('upload_proyect')}}">
  @error('upload_proyect')
  <div class=" alert-danger">El proyecto es requerido</div>
  @enderror
  <img src="{{isset($emprendimiento)?asset('storage'). '/' . $emprendimiento->upload_proyect:old('upload_proyect')}}" alt="">
  <label for="logo">(Opcional) Logo (JPEG/PNG):</label>
  <div class="PRP-DIV">
    <input type="file" name="up_image_logo" accept="image/png, image/jpeg" class="form-file LGO-image" id="up_image_logo" value="{{isset($emprendimiento->up_image_logo)?$emprendimiento->up_image_logo:old('up_image_logo')}}">
    <img src="{{isset($emprendimiento)?asset('storage'). '/' . $emprendimiento->up_image_logo:old('up_image_logo')}}" alt="">
  </div>
</div>
<div class="right">

  <label for="main_products">Productos Principales (JPEG/PNG):</label>
  <div class="PRP-DIV">
    <textarea id="textproducts"   require="" pattern="[a-zA-Z1-9 ]{1,999}" class="comment" placeholder="Ingrese sus productos principales">{{isset($emprendimiento->main_products)?$emprendimiento->main_products:old('main_products')}}</textarea>
    <input type="hidden" name="main_products"id="main_products">
    @error('main_products')
  <div class=" alert-danger">El detalle de los Productos Principales son requeridos</div>
  @enderror
    <br>
    <label for="main_products">Subir una imagen de los productos principales:</label>
    <br>
    <input type="file" name="up_image_main_products" accept="image/png, image/jpeg image/JPG" class="form-file" id="up_image_main_products" value="{{isset($emprendimiento->up_image_main_products)?$emprendimiento->number_employees:old('up_image_main_products')}}">
    @error('up_image_main_products')
  <div class=" alert-danger">La imagen de los productos son requeridos</div>
  @enderror
    <img src="{{isset($emprendimiento)?asset('storage'). '/' . $emprendimiento->up_image_main_products:old('up_image_main_products')}}" alt="">
  </div>
  <label for="main_service">Servicios Principales</label>
  <textarea id="textservice" class="comment" require=""  pattern="[a-zA-Z ]{2,999}" placeholder="Ingrese sus servicios principales">{{isset($emprendimiento->main_service)?$emprendimiento->main_service:old('main_service')}}</textarea>
  <input type="hidden" name="main_service" id="main_service">
  @error('main_service')
  <div class=" alert-danger">Los Servicios Principales son requeridos el limite es de 220 caracteres</div>
  @enderror
  <label for="main_investment_source">Fuente de Inversion Principales:</label>
  <input type="text" name="main_investment_source" class="form-control" id="main_investment_source" value="{{isset($emprendimiento->main_investment_source)?$emprendimiento->main_investment_source:old('main_investment_source')}}">
  @error('main_investment_source')
  <div class=" alert-danger">La Fuente de Inversion Principales es requerida</div>
  @enderror
  <label for="principal_investment_range">Rango de Inversion Principal:</label>
  <div>
  <input type="number" min="1"  max="100000000" name="principal_investment_range" class="form-control" id="principal_investment_range" value="{{isset($emprendimiento->principal_investment_range)?$emprendimiento->principal_investment_range:old('principal_investment_range')}}">
  @error('principal_investment_range')
  <div class=" alert-danger">Rnago de Inversion Principal es requerido</div>
  @enderror
</div>
  <label for="mark">Marca (JPEG/PNG):</label>
  <input type="file" name="up_image_main_mark" accept="image/png, image/jpeg  image/JPG" class="form-file" id="mark" value="{{isset($emprendimiento->up_image_main_mark)?$emprendimiento->up_image_main_mark:old('up_image_main_mark')}}">
  @error('up_image_main_mark')
  <div class=" alert-danger">La marca es requerida</div>
  @enderror
  <img src="{{isset($emprendimiento)?asset('storage'). '/' . $emprendimiento->up_image_main_mark:old('up_image_main_mark')}}" alt="">
  <label for="number_employees">Numero de Empleados:</label>
  <div>
  <input type="number" name="number_employees" min="1" max="10000000000" class="form-control" id="number_employees" value="{{isset($emprendimiento->number_employees)?$emprendimiento->number_employees:old('number_employees')}}">
  @error('number_employees')
  <div class=" alert-danger">El numero de empleado  es requerido</div>
  @enderror  
</div>
  <div class="buttons">
  <input id="save" class="second-button" type="submit" value="{{$modo}}">
  </div>
</div>
<script src="https://form.deone.com.ec/public/js/validacionEmprendimiento.js"></script>