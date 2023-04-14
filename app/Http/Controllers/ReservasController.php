<?php

namespace App\Http\Controllers;

use App\Models\Reserva;
use App\Models\Cliente;
use App\Models\Local;
use App\Models\Equipamento;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;

class ReservasController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reservas = Reserva::paginate(25);
        Paginator::useBootstrap();
        return view('reserva.lista', compact('reservas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $equipamentos = Equipamento::select('nome', 'id')->pluck('nome', 'id');
        $locais = Local::select('nome', 'id')->pluck('nome', 'id');
        $clientes = Cliente::select('nome', 'id')->pluck('nome', 'id');
        return view('reserva.formulario', compact('equipamentos', 'locais', 'clientes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $reserva = new Reserva();
        $reserva->fill($request->all());
        if ($reserva->save()){
            $tipo = 'mensagem_sucesso';
            $msg = 'Reserva salva!';
        }
        else{
            $tipo = 'mensagem_erro';
            $msg = 'Deu erro!';
        }
        return Redirect::to('reserva/create')->with($tipo, $msg);
    }

    /**
     * Display the specified resource.
     */
    public function show(Reserva $reserva)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reserva $reserva)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reserva $reserva)
    {
        $reserva = Reserva::findOrFail($reserva->id);
        $reserva->fill($request->all());
        if ($reserva->save()){
            $tipo = 'mensagem_sucesso';
            $msg = 'Reserva alterado!';
        }
        else{
            $tipo = 'mensagem_erro';
            $msg = 'Deu erro!';
        }
        return Redirect::to('reserva/create')->with($tipo, $msg);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reserva $reserva)
    {
        $reserva = Reserva::findOrFail($reserva->id);
        if ($reserva->delete()){
            $tipo = 'mensagem_sucesso';
            $msg = 'Reserva removido!';
        }
        else{
            $tipo = 'mensagem_erro';
            $msg = 'Deu erro!';
        }
        return Redirect::to('reserva/create')->with($tipo, $msg);
    }

    public function devolver($reserva_id){
        $reserva = Reserva::findOrFail($reserva_id);
        $reserva->devolucao = Carbon::now('America/Sao_Paulo');
        if ($reserva->save()){
            $tipo = 'mensagem_sucesso';
            $msg = 'Reserva alterado!';
        }
        else{
            $tipo = 'mensagem_erro';
            $msg = 'Deu erro!';
        }
        return Redirect::to('reserva')->with($tipo, $msg);
    }
}
