<h1>{{$fruta->nombre}}</h1>
<p>
    {{$fruta->descripcion}}
</p>

<h3><a href="{{action('FrutaController@delete',['id'=>$fruta->id])}}">Eliminar</a></h3>
<h3><a href="{{action('FrutaController@edit',['id'=>$fruta->id])}}">Actualizar</a></h3>
