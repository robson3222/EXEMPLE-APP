@extends('layouts.main')

@section('title', 'rbso')


@section('content')

<div id="search-container" class="col-md-12">

<h1>Buscar</h1>
    <form action="/" method="GET">
        <input type="text" id="search" name="search"  class="form-control" placeholder="Procurar" >
    </form>
</div>
<div id="events-container" class="col-md-12">
    @if($search)
    <h2>buscando por: {{ $search }}</h2>
    @else
  <h2>Proximos</h2>
  <p class="subtitle">Veja agenda próximos dias</p>
  @endif
<div id="cards-container" class="row">
      @foreach($agendas as $agenda)
      <div class="card col-md-3">
            <img src="/img/agendas/{{ $agenda->image}}" alt="{{ $agenda->titulo }}">
            <div class="card-body">
            <h3><p class="card-date"> Data da Ocorrencia: {{ date('d/m/y', strtotime ($agenda->datainicio))}} -- hora: {{ $agenda->hora }}</p></h3>
                <h1 class="info-container">{{$agenda->titulo}}</h1>
                <p class="info-container">Area: {{$agenda->area}} -- Ocorrencia: {{$agenda->trabalhore}} </p>
                <h7 class="info-container">Parecer: {{$agenda->parecer}} </h7>
                <p class="card-participants">{{ count($agenda->users)}} {{$agenda->estado}}...</p>
                <a href="/agendas/{{ $agenda->id }}" class="btn btn-primary">Saber mais</a>

            </div>

      </div>
       @endforeach
    @if(count($agendas) == 0 && $search)
        <p>nao possivel encontrar {{ $search}}! <a href="/">Ver todos!</a></p>
    @elseif(count($agendas) == 0)
      <p>nao a registros disponível</p>
    @endif

</div>
</div>



@endsection
