@if(isset($fruta) && is_object($fruta))
    <h>Editar fruta</h>  
@else
    <h>Crear una fruta</h>
@endif
<form action="{{isset($fruta) ? action('FrutaController@update'): action('FrutaController@save')}}" method="post">
    {{ csrf_field()  }}
    @if(isset($fruta) && is_object($fruta))
        <input type="hidden" name="id" value="{{$fruta->id}}">
    @endif
    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" value="{{isset($fruta) ? $fruta->nombre:''}}">
    <br>
    <label for="descripcion">Descripción</label>
    <input type="text" name="descripcion" value="{{$fruta->descripcion ?? ''}}">
    <br>
    <label for="precio" >Precio</label>
    <input type="number" name="precio" value="{{$fruta->precio ?? 0}}">
    <br>
    

    <input type="submit" value="Guardar">
</form>