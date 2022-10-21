
@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')

<div class="col-md offset-md-1 dashboard-title-container">

<h1> Meus Agendamentos</h1>
</div>

<div class="col-md10 offset-md-1 dashboard-events-container">
    @if(count($agendas) > 0)
    @else
    <p>Você ainda não tem agendamentos, <a href="/agendas/create">Agendar</a>
    </p>
    @endif
</div>

@endsection
