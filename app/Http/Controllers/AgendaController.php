<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Agenda;
use App\Models\User;

class AgendaController extends Controller
{
    public function index() {

        $search = request('search');

        if($search) {

            $agendas = Agenda::where([
                ['titulo', 'like', '%'.$search.'%']
            ])->get();

        }else {
            $agendas = Agenda::orderBy('datainicio', 'ASC')->paginate();

        }

       return view('welcome',['agendas'=> $agendas, 'search' => $search]);
    }

    public function create() {
        return view('agendas.create');
    }

   public function store(Request $request){

       $agenda = new Agenda;

       $agenda->estado = $request->estado;
       $agenda->trabalhore = $request->trabalhore;
       $agenda->area = $request->area;
       $agenda->titulo = $request->titulo;
       $agenda->obs = $request->obs;
       $agenda->descricao = $request->descricao;
       $agenda->datainicio = $request->datainicio;
       $agenda->hora = $request->hora;
       $agenda->parecer = $request->parecer;



     if($request->hasFile('image') && $request->file('image')->isValid()) {

        $requestImage = $request->image;

        $extension = $requestImage->extension();

        $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "."  . $extension ;

        $request->image->move(public_path('img/agendas'), $imageName);

        $agenda->image = $imageName;


     }

     $user = auth()->user();
     $agenda->user_id = $user->id;

       $agenda->save();

       return redirect('/')->with('msg', 'Gravado com sucesso');


   }
 public function show($id){

    $agenda = Agenda::findOrFail($id);

    $user = auth()->user();
    $hasUserJoined = false;

    if($user) {

      $userAgendas = $user->agendasAsParticipant->toArray();

       foreach($userAgendas as $userAgenda ) {
         if($userAgenda['id'] == $id) {
             $hasUserJoined = true;
         }

       }
    }

    $agendaOwner = User::where('id', $agenda->user_id)->first()->toArray();

    return view('agendas.show',['agenda' => $agenda, 'agendaOwner' => $agendaOwner, 'hasUserJoined' => $hasUserJoined]);

 }




  public function dashboard() {
      $user = auth()->user();

      $agendas = $user->agendas;


      $agendasAsParticipant = $user->agendasAsParticipant;

      return view('agendas.dashboard' ,
      ['agendas'=> $agendas, 'agendasasparticipant' => $agendasAsParticipant]
    );
  }


  public function destroy($id){

    Agenda::findOrFail($id)->delete();

    return redirect('/dashboard')->with('msg', 'Excluido com sucesso!!!');
  }

  public function edit($id) {

    $agenda = Agenda::findOrFail($id);

      return view('agendas.edit', ['agenda' => $agenda]);
  }

 public function update(Request $request) {

    $data = $request->all();

    if($request->hasFile('image') && $request->file('image')->isValid()) {

        $requestImage = $request->image;

        $extension = $requestImage->extension();

        $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "."  . $extension ;

        $request->image->move(public_path('img/agendas'), $imageName);

        $data['image'] = $imageName;

     }


    Agenda::findOrFail($request->id)->update($data);

     return redirect('/dashboard')->with('msg', 'Editado com sucesso');
 }

    public function joinAgenda($id) {

        $user = auth()->user();

        $user->agendasAsParticipant()->attach($id);

        $agenda = Agenda::findOrFail($id);

        return redirect('/dashboard')->with('msg', 'Esta Fiscalizando o Agendamento'  . $agenda->titulo);


    }

     public function leaveAgenda($id) {
        $user = auth()->user();

        $user->agendasAsParticipant()->detach($id);

        $agenda = Agenda::findOrFail($id);

        return redirect('/dashboard')->with('msg', 'Vc saiu da Fiscalização '  . $agenda->titulo);


     }


}

