@include('includes.header')
<!-- IMPRIMIR POR PANTALLA -->
<h1>{{$titulo}}</h1>
<h2><?= $listado[2] ?></h2>
<p>{{date('Y')}}</p>

<!-- Comentario en html -->
<?php
// Comentario en php
?>

{{-- Comentario en blade --}}

<!-- MOSTRAR SI EXIXSTE -->
{{-- En php --}}
<?= isset($director) ? $director : 'No existe director'; ?><br/>

{{-- En blade --}}
{{ $director ?? 'No hay ningun director'}}<br/>

<!-- ESTRUCTURAS DE CONTROL -->

@if($titulo && count($listado) >= 2)
    <h1>El titulo existe y es este {{$titulo}} y el listado es mayor a 2</h1>
@elseif($titulo)
    <h1>El titulo existe y el listado no es mayor a 2</h1>
@else
    <h1>La condicion no se a cumplido</h1>
@endif

<!-- BUCLES -->

@for($i = 1; $i <= 20; $i++)
    EL numero es: {{$i}}<br/>
@endfor

<hr>
<?php $contador = 0?>
@while($contador < 50)
    @if($contador % 2 == 0)
        Numero par: {{$contador}}<br/>
    @endif
    <?php $contador++; ?>
@endwhile

<hr>
@foreach($listado as $pelicula)
    <p>{{$pelicula}}</p>
@endforeach

@include('includes.footer')