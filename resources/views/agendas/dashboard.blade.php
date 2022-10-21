
@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')

<div class="col-md-10 offset-md-1 dashboard-title-container">

<h1> Meus Agendamentos</h1>
</div>

<div class="col-md10 offset-md-1 dashboard-events-container">
    @if(count($agendas) > 0)
     <table class="table">
         <thead>
             <tr>
              <th scope="col">Quantidade   </th>
              <th scope="col">Titulo   </th>
              <th scope="col">Area </th>
              <th scope="col">Novo/Retrabalho </th>
              <th scope="col">Descrição  </th>
              <th scope="col">Estado  </th>
              <th scope="col">Participantes </th>
              <th scope="col">Açôes  </th>
             </tr>
         </thead>

   <tbody>
       @foreach($agendas as $agenda)
   <tr>
       <td scropt="row">{{ $loop-> index + 1}}</td>
       <td><a href="/agendas/{{ $agenda->id }}">{{ $agenda->titulo}} </a></td>
       <td>{{$agenda->area}}</td>
       <td>{{$agenda->trabalhore}}</td>
       <td>{{$agenda->descricao}}</td>
       <td>{{$agenda->estado}}</td>
       <td>{{ count($agenda->users)}} </td>
       <td><a href="/agendas/edit/{{ $agenda->id }}" class="btn btn-info edit-btn">Editar</a>
       <form action="/agendas/{{ $agenda->id }}" method="post">
       @csrf
       @method('DELETE')
       <button type="submit" class="btn btn-danger delete-btn">Detelar</button>
    </form>

   </tr>

       @endforeach
   </tbody>
   </table>
    @else
    <p>Você ainda não tem agendamentos, <a href="/agendas/create">Agendar</a>
    </p>
    @endif
</div>
<div class="col-md-10 offset-md-1 dashboard-title-container">

<h1> Agendamentos que estou Participando</h1>

    @if(count($agendasasparticipant)>  0)
    <table class="table">
         <thead>
             <tr>
             <th scope="col">Quantidade   </th>
              <th scope="col">Titulo   </th>
              <th scope="col">Area </th>
              <th scope="col">Novo/Retrabalho </th>
              <th scope="col">Descrição  </th>
              <th scope="col">Estado  </th>
              <th scope="col">Participantes </th>
              <th scope="col">Açôes  </th>
             </tr>
         </thead>

   <tbody>
       @foreach($agendasasparticipant as $agenda)
   <tr>
       <td scropt="row">{{ $loop-> index + 1}}</td>
       <td><a href="/agendas/{{ $agenda->id }}">{{ $agenda->titulo}} </a></td>
       <td>{{$agenda->area}}</td>
       <td>{{$agenda->trabalhore}}</td>
       <td>{{$agenda->descricao}}</td>
       <td>{{$agenda->estado}}</td>
       <td>{{ count($agenda->users)}} analizando</td>
      <td>
        <form action="/agendas/leave/{{ $agenda->id }}" method="post">
        @csrf
        @method("Delete")
        <button type="submit" class="btn btn-danger delete-btn">
           Sair do Agendamento </button>


        </form>


      </td>

   </tr>

       @endforeach
   </tbody>
   </table>
    @endif

    <p>Voce não fiscalizou ainda nenhum agendamento , <a href="/"> Veja Todos os Agendamentos></a></p>
</div>
@endsection
