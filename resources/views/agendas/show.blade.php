@extends('layouts.main')

@section('title', $agenda->titulo)

@section('content')

<div class="col-md-10 offset-1">
    <div class="row">
        <div id="image-container" class="col-md-6">
            <img src="/img/agendas/{{ $agenda->image }}" class="img-fluid" alt="{{ $agenda->titulo }}">
        </div>
        <div id="info-container" class="col-md-6">
            <h1 class="info-container">{{$agenda->titulo}}</h1>
            <h3><p class="card-date"> Data da Ocorrencia: {{ date('d/m/y', strtotime ($agenda->datainicio))}} -- hora: {{ $agenda->hora }}</p></h3>
            <h6 class="info-container"> Area: {{$agenda->area}}  -- Ocorrencia: {{$agenda->trabalhore}}</h6>
            <h6 class="info-container">Descrição: {{$agenda->descricao}} </h6>
            <p class="info-container"> Obs: {{$agenda->obs}}</p>
            <p class="info-container"> Parecer: {{$agenda->parecer}}</p>
            <p class="info-container"> {{$agenda->descricao}}</p>
            <p class="info-container"> {{ count($agenda->users)}} -- {{$agenda->estado}}...</p>
            <p class="info-container"> Preenchido pelo Usuario(a): {{ $agendaOwner['name'] }}</p>
            @if(!$hasUserJoined)
            <form action="/agendas/join/{{ $agenda->id }}" method="POST">
            @csrf
           <a href="/agendas/join/{{ $agenda->id }}"
            class="btn btn-primary"
            id="event-submit"
            onclick="event.preventDefault();
            this.closest('form').submit();">
             Confimar Presença
            </a>
        </form>
            @else

            <p class="already-joined-msg">Você esta fiscalizando!</p>

            @endif



        </div>
        <div  class="col-md-12" id="description-container">
            <h3>Descriçao</h3>
            <p class="event-description">{{ $agenda->descricao }}</p>

        </div>
    </div>
</div>

@endsection
