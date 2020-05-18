@extends('layout.site')

@section('titulo','Cursos')

@section('conteudo')
  <div class="container">
    <h3 class="center">Lista de cursos</h3>
    <div class="row">
    <!-- pegando o nosso cursos-->
      @foreach($cursos as $curso)
      <!-- importa materialize "s12 m4" tamanho da tela -->
        <div class="col s12 m4">
          <div class="card">
            <div class="card-image">
            <!--pegando imagem do banco-->
              <img src="{{asset($curso->imagem)}}">
            </div>
            <div class="card-content">
              <h4>{{$curso->titulo}}</h4>
              <p>{{$curso->descricao}}</p>
            </div>
            <div class="card-action">
              <a href="#">Ver mais...</a>
            </div>
          </div>
        </div>
      @endforeach
    </div>
        <div classe="row" align="center">
          {{$cursos->links()}}
        </div>
  </div>

@endsection
