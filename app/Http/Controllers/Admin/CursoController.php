<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Curso;

class CursoController extends Controller
{
    public function index()
    {
      //trazendo tds dados de curso e compact esta enviando para registro
      $registros = Curso::all();
      return view('admin.cursos.index',compact('registros'));
    }
    public function adicionar()
    {
      return view('admin.cursos.adicionar');
    }
    public function salvar(Request $req)
    {
      $dados = $req->all();

      if(isset($dados['publicado'])){
        $dados['publicado'] = 'sim';
      }else{
        $dados['publicado'] = 'nao';
      }

      if($req->hasFile('imagem')){
        $imagem = $req->file('imagem');
        $num = rand(1111,9999);
        $dir = "img/cursos/";
        $ex = $imagem->guessClientExtension();
        $nomeImagem = "imagem_".$num.".".$ex;
        $imagem->move($dir,$nomeImagem);
        $dados['imagem'] = $dir."/".$nomeImagem;
      }
      //salvando no banco
      Curso::create($dados);

      return redirect()->route('admin.cursos');

    }

    public function editar($id)
    {
      $registro = Curso::find($id);
      return view('admin.cursos.editar',compact('registro'));
    }
      //quase é identico a "salvar copiar td de salvar"
    public function atualizar(Request $req, $id)
    {
      $dados = $req->all();

      if(isset($dados['publicado'])){
        $dados['publicado'] = 'sim';
      }else{
        $dados['publicado'] = 'nao';
      }

      if($req->hasFile('imagem')){
        $imagem = $req->file('imagem');
        $num = rand(1111,9999);
        $dir = "img/cursos/";
        $ex = $imagem->guessClientExtension();
        $nomeImagem = "imagem_".$num.".".$ex;
        $imagem->move($dir,$nomeImagem);
        $dados['imagem'] = $dir."/".$nomeImagem;
      }
      //A unica coisa diferente com salvar é find, para buscar dados no banco
      Curso::find($id)->update($dados);

      return redirect()->route('admin.cursos');

    }

    public function deletar($id)
    {
      Curso::find($id)->delete();
      return redirect()->route('admin.cursos');
    }

}
