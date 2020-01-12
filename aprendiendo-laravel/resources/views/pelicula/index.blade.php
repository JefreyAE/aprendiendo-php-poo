<h1>{{$titulo}}</h1>
<p>Acción index de Pelicula controller</p>
<h2>Número de página: {{$pagina}}</h2>

@if(isset($pagina))
    <h3> La pagina es: {{$pagina}}</h3>
@endif

// LINKS EN LARAVEL <br>

<a href="{{action('PeliculaController@detalle')}}">Ir al listado </a><br>
<a href="{{route('detalle.peliculas',['id' =>'12'])}}">Ir al listado </a>



