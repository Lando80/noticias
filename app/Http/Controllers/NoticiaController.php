<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\NoticiaRequest;

use App\Models\Noticia;
use Carbon\Carbon;

class NoticiaController extends Controller
{
    
    public function index()
    { 
        $noticias = Noticia::paginate(4);
     
        return view('noticias.index', ["noticias" => $noticias]);
    }
    
    //--------------------------------------------------------------
    
    public function create()
    {
        return view('noticias.form');
    }

    //--------------------------------------------------------------

    public function edit($noticia)
    {
        $noticia = Noticia::find($noticia);

        return view('noticias.form', [
            "noticia" => $noticia
        ]);
    }

    //--------------------------------------------------------------
    
    public function store(NoticiaRequest $request)
    {
        $dados = $request->all(); //recebe todos os dados do formulário
        
        $dados['data_publicacao'] = Carbon::createFromFormat("d/m/Y", $dados['data_publicacao'])->format("Y-m-d");
    //  $dataFormatada = Carbon::createFromFormat("d/m/Y", $request->data_publicacao)->format("Y-m-d");
        
        $request->imagem->storeAs('public', $request->imagem->getClientOriginalName());
        $dados['imagem'] = '/storage/' . $request->imagem->getClientOriginalName();
        
        $noticia = Noticia::create($dados);
 
        return redirect()->back()->with(['mensagem'=>'Registro salvo com sucesso']);
    }

    //--------------------------------------------------------------

    public function update($noticia, NoticiaRequest $request)
    {
        //$noticia = Noticia::find($noticia);
        $dados = $request->all();

        $dataFormatada = Carbon::createFromFormat("d/m/Y", $request->data_publicacao)->format("Y-m-d");
        $dados['data_publicacao'] = $dataFormatada;

//        $nomeImagem = $request->imagem->getClientOriginalName();
//        $pathImagem = $request->imagem->storeAs('public', $nomeImagem);
//        $dados['imagem'] = '/storage' . $pathImagem;
        
        $request->imagem->storeAs('public', $request->imagem->getClientOriginalName());
        $dados['imagem'] = '/storage/' . $request->imagem->getClientOriginalName();
        

        $noticia = Noticia::find($noticia);
        $noticia->update($dados);

        return redirect()->back()->with(['mensagem' => 'Registro EDITADO com sucesso']);

    }

    //--------------------------------------------------------------

    public function destroy($noticia)
    {
        $noticia = Noticia::find($noticia);
        $noticia->delete();

        return redirect()->back()
            ->with(['mensagem'=> 'CPF CANCELADO.... com sucesso!']);
    }

}