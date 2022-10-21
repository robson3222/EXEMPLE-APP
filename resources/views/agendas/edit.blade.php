@extends('layouts.main')

@section('title', 'Editando:'  . $agenda->titulo)

@section('content')
<div  id="event-create-container" class="col-md-6 offset-md-3">
    <h1>Editando: {{ $agenda->titulo}}</h1>
    <form action="/agendas/update/{{ $agenda->id}}" method="post" enctype="multipart/form-data">
        @csrf
        @method ('PUT')
        <div class="form-group">
        <label for="image"> Imagem  </label>
<input  id="image" type="file" name="image"  class="from-control-file"/>
<img src="/img/agendas/{{ $agenda->image}}" alt=" $agenda->titulo" class="img-preview">
</div>


<hr>
<h7>Local da Manutenção</h7>
<div class="form-check">
<input class="form-check-input" type="radio" name="area"  value="interna" {{$agenda->area == 'interna' ? 'checked' : ''}} id="flexRadioDefault1"/>
<label class="form-check-label"for="flexRadioDefault1" >
Interna
</label>
</div>
<div class="form-check">
<input class="form-check-input" type="radio" name="area" value="externa" {{$agenda->area == 'externa' ? 'checked' : ''}} id="flexRadioDefault1"  />
<label class="form-check-label" for="flexRadioDefault1">
Externa
</label>
</div>

<hr>

<h7>Estado</h7>
<div class="form-check">
<input class="form-check-input" type="radio" name="estado"  value="analizando" {{$agenda->estado == 'analizando' ? 'checked' : ''}} id="flexRadioDefault1"/>
<label class="form-check-label"for="flexRadioDefault1" >
Analizando
</label>
</div>
<div class="form-check">
<input class="form-check-input" type="radio" name="estado" value="finalizado" {{$agenda->estado == 'finalizado' ? 'checked' : ''}} id="flexRadioDefault1"/>
<label class="form-check-label" for="flexRadioDefault1">
Finalizado
</label>
</div>

<hr>

<h7> Nova Ordem  de Serviço ou Retrabalho</h7>
<div class="form-check">
<input class="form-check-input" type="radio" name="trabalhore"  value="novo" {{$agenda->trabalhore == 'novo' ? 'checked' : ''}}  id="flexRadioDefault1"/>
<label class="form-check-label"for="flexRadioDefault1" >
Novo
</label>
</div>
<div class="form-check">
<input class="form-check-input" type="radio" name="trabalhore" value="retrabalho" {{$agenda->trabalhore == 'retrabalho' ? 'checked' : '' }} id="flexRadioDefault1"/>
<label class="form-check-label" for="flexRadioDefault1">
Retrabalho
</label>
</div>

<hr>
<div class="form-group">
<label>Titulo</label>
<input type="text" name="titulo" class="form-control"  placeholder="Titulo" value="{{$agenda->titulo}}">
</div>

<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Descrição</label>
  <textarea class="form-control" name="descricao" id="exampleFormControlTextarea1" rows="3">{{$agenda->descricao}}</textarea>
</div>

<div class="form-group">
<label>Obs</label>
<input type="text" name="obs" class="form-control"  placeholder="obs" value="{{$agenda->obs}}">
</div>

<div class="form-group" >
<label>Data inicio</label>
<input type="date" name="datainicio" class="form-control"  placeholder="datainicio" value="{{$agenda->datainicio}}">
</div>

<div class="form-group" >
<label>Hora</label>
<input type="time" name="hora" class="form-control phone_with_ddd"  placeholder="hora" value="{{$agenda->hora}}">
</div>

<div class="form-group">
<label>Parecer</label>
<input type="text" name="parecer" class="form-control "  placeholder="parecer" value="{{$agenda->parecer}}">
</div>



<div style="text-align: right">
<button type="submit" class="btn btn-sm btn-success" value="Editar Agenda ">Editar</button>
</div>

</form>
</div>
</div>

@endsection
