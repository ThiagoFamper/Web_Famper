<?php

namespace App\Http\Controllers;

use App\Models\Tipo;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Redirect;
use Intervention\Image\Facades\Image;

class TiposController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function listar(){
        $tipos = Tipo::paginate(25);
        Paginator::useBootstrap();
        return view('tipo.lista', compact('tipos'));
    }
    public function create(){
        return view('tipo.formulario');
    }
    public function store(Request $request){
        $tipo = new Tipo();
        $tipo->fill($request->all());
        if($tipo->save()){
            $request->session()->flash('mensagem_sucesso', 'Tipo salvo!');
        }
        else{
            $request->session()->flash('mensagem_erro', 'Deu erro!');
        }
        return Redirect::to('tipo/create');
    }
    public function update(Request $request, $tipo_id){
        $tipo = Tipo::findOrFail($tipo_id);
        $tipo->fill($request->all());
        if($tipo->save()){
            $request->session()->flash('mensagem_sucesso', 'Tipo alterado!');
        }
        else{
            $request->session()->flash('mensagem_erro', 'Deu erro!');
        }
        return Redirect::to('tipo/'.$tipo->id);
    }
    public function show($id){
        $tipo = Tipo::findOrFail($id);
        return view('tipo.formulario', compact('tipo'));
    }
    public function deletar(Request $request, $tipo_id){
        $tipo = Tipo::findOrFail($tipo_id);
        $tipo->delete();
        $request->session()->flash('mensagem_sucesso', 'Tipo removido com sucesso');
        return Redirect::to('tipo');
    }
    public function showReport(){
        $tipos = Tipo::get();
        $imagem = 'uploads/tipos/semfoto.jpg';
        $tipo = pathinfo($imagem, PATHINFO_EXTENSION);
        $data = file_get_contents($imagem);
        $base64 = base64_encode(($imagem));
        $logo = 'data:image/' . $tipo . ';base64' . $base64;

        $logo = base64_encode(file_get_contents(public_path('/uploads/tipos/semfoto.jpg')));
        $pdf = Pdf::loadView('reports.tipos', compact('tipos', 'logo'));

        $pdf->setPaper('a4', 'portrait')
            ->setOptions(['dpi'=>150, 'defaultFont'=>'sans-serif'])
            ->setEncryption('123');

        return $pdf
            //->download('relatorio.pdf');
            //->save(public_path('/arquivos/relatorio.pdf'));
            ->stream('relatorio.pdf');
    }
}