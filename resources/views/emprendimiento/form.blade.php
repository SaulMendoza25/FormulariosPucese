
@section('content')
<div class="left">
  <label for="name_proyect">Nombre del proyecto:</label>
  <input type="text" name="name_proyect" class="form-control" id="name_proyect" value="{{isset($emprendimiento->name_proyect)?$emprendimiento->name_proyect:''}}">
  <label for="name_property">Nombre(s) Propietario(s):</label>
  <input type="text" name="name_property" class="form-control" id="name_property" value="{{isset($emprendimiento->name_property)?$emprendimiento->name_property:''}}">
  <label for="addresses">Direccion:</label>
  <input type="text" name="addresses" class="form-control" id="addresses" value="{{isset($emprendimiento->addresses)?$emprendimiento->addresses:''}}">
  <label for="phone_number">Telefono:</label>
  <input type="text" NAME="phone_number" class="form-control" id="phone_number" value="{{isset($emprendimiento->phone_number)?$emprendimiento->phone_number:''}}">
  <label for="email">Correo Electronico:</label>
  <input type="text" name="email" class="form-control" id="email" value="{{isset($emprendimiento->email)?$emprendimiento->email:''}}">
  <label for="start_date">Fecha de inicio negocio:</label>
  <input type="date" min="2023-01-01" max="2150-01-01" name="start_date" class="form-control" id="start_date" value="{{isset($emprendimiento->start_date)?$emprendimiento->start_date:''}}">
  <label for="end_date">Fecha de Fin:</label>
  <input type="date" min="2023-01-01" max="2150-01-01" name="end_date" class="form-control" id="end_date" value="{{isset($emprendimiento->end_date)?$emprendimiento->end_date:''}}">

  <label for="require_trainings">Requiere Capacitaciones:</label>
  <select class="combo" onChange="combo(this, 'demo')" id="require_trainings" value="{{isset($emprendimiento->require_trainings)?$emprendimiento->require_trainings:''}}">
    <option value="Si">Si</option>
    <option value="No">No</option>
  </select>
  <input name="theme_require_trainings" cols="40" rows="5" class="comment" id="theme_require_trainings" value="{{isset($emprendimiento->theme_require_trainings)?$emprendimiento->theme_require_trainings:''}}">
  <label for="upload_proyect">Subir el proyecto (PDF):</label>
  <input type="file" name="upload_proyect" accept="application/pdf" class="form-file" id="upload_proyect" value="{{isset($emprendimiento->upload_proyect)?$emprendimiento->upload_proyect:''}}">
  {{isset($emprendimiento->upload_proyect)?$emprendimiento->upload_proyect:''}}
  <img src="{{isset($emprendimiento)?asset('storage'). '/' . $emprendimiento->upload_proyect:''}}" alt="">
  <label for="logo">Logo (JPEG/PNG):</label>
  <div class="PRP-DIV">
    <select class="combo" onChange="combo(this, 'demo')" id="logo" value="{{isset($emprendimiento->logo)?$emprendimiento->logo:''}}">
      <option value="Si">Si</option>
      <option value="No">No</option>
    </select>
    <input type="file" name="up_image_logo" accept="image/png, image/jpeg" class="form-file LGO-image" id="up_image_logo" value="{{isset($emprendimiento->up_image_logo)?$emprendimiento->up_image_logo:''}}">
    <img src="{{isset($emprendimiento)?asset('storage'). '/' . $emprendimiento->up_image_logo:''}}" alt="">
  
  </div>
</div>
<div class="right">

  <label for="main_products">Productos Principales (JPEG/PNG):</label>
  <div class="PRP-DIV">
    <input name="main_products" cols="40" rows="5" class="comment" id="main_products" value="{{isset($emprendimiento->main_products)?$emprendimiento->main_products:''}}">
    <input type="file" name="up_image_main_products" accept="image/png, image/jpeg image/JPG" class="form-file" id="up_image_main_products" value="{{isset($emprendimiento->up_image_main_products)?$emprendimiento->up_image_main_products:''}}">
    <img src="{{isset($emprendimiento)?asset('storage'). '/' . $emprendimiento->up_image_main_products:''}}" alt="">
  </div>
  <label for="main_service">Servicios Principales</label>
  <input type="text" name="main_service" cols="40" rows="5" class="comment" id="main_service" value="{{isset($emprendimiento->main_service)?$emprendimiento->main_service:''}}">
  <label for="main_investment_source">Fuente de Inversion Principales:</label>
  <input type="text" name="main_investment_source" class="form-control" id="main_investment_source" value="{{isset($emprendimiento->main_investment_source)?$emprendimiento->main_investment_source:''}}">
  <label for="principal_investment_range">Rango de Inversion Principal:</label>
  <input type="text" name="principal_investment_range" class="form-control" id="principal_investment_range" value="{{isset($emprendimiento->principal_investment_range)?$emprendimiento->principal_investment_range:''}}">
  <label for="mark">Marca (JPEG/PNG):</label>
  <input type="file" name="up_image_main_mark" accept="image/png, image/jpeg  image/JPG" class="form-file" id="mark" value="{{isset($emprendimiento->up_image_main_mark)?$emprendimiento->up_image_main_mark:''}}">
  <img src="{{isset($emprendimiento)?asset('storage'). '/' . $emprendimiento->up_image_main_mark:''}}" alt="">
  <label for="number_employees">Numero de Empleados:</label>
  <input type="text" name="number_employees" class="form-control" id="number_employees" value="{{isset($emprendimiento->number_employees)?$emprendimiento->number_employees:''}}">
  <div class="buttons">
  <input class="second-button" type="submit" value="{{$modo}}">
  <a href="{{url('emprendimiento/')}}"  class="second-button">Volver</a>
  </div>
</div>