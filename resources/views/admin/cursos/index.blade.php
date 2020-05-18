@extends('layout.site')

@section('titulo','Cursos')

@section('conteudo')
  <div class="container">
    <h3 class="center">Lista de cursos</h3>
    <div class="row">
      <table>
        <thead>
          <tr>
            <th>Id</th>
            <th>Título</th>
            <th>Descrição</th>
            <th>Imagem</th>
            <th>Publicado</th>
            <th>Editar</th>
            <th>Apagar</th>
          </tr>
        </thead>
        <tbody>
          @foreach($registros as $registro)
            <tr>
              <td>{{ $registro->id }}</td>
              <td>{{ $registro->titulo }}</td>
              <td>{{ $registro->descricao }}</td>
              <td><img height="60" src="{{asset($registro->imagem)}}" alt="{{ $registro->titulo }}" /></td>
              <td>{{ $registro->publicado }}</td>
              <td>
                <a href="{{route('admin.cursos.editar', $registro->id)}}" class="btn orange">
                  <i class="text-primary  feather-16"  data-feather="edit" ></i>
                </a>
                </td>
                <td>
                <a href="{{route('admin.cursos.deletar', $registro->id)}}" class="btn red">
                <i class="text-danger feather-16" data-feather="trash-2"></i>
                </a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
		<div class="row">
			  <a href="{{route('admin.cursos.adicionar')}}" class="btn  light-green">
				<i data-feather="plus-square"></i>
			 </a>
		</div>
  </div>




@endsection
