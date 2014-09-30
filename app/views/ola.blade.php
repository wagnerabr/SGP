@extends('template')

@section('conteudo')
	<div class="col-lg-4">
          <img class="img-circle" data-src="holder.js/140x140" alt="Generic placeholder image">
          <h2>Hello {{ $usuario }}!</h2>
          <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.</p>
          <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
    </div><!-- /.col-lg-4 -->

@stop