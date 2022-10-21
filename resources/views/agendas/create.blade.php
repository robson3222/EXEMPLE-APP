@extends('layouts.main')

@section('title', 'Agendar')

@section('content')
<div  id="event-create-container" class="col-md-6 offset-md-3">
    <h1>Agendar</h1>
    <form action="/agendas" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
        <label for="image"> Imagem anexar: </label>
<input  id="image" type="file" name="image"  class="from-control-file"/>

<hr>
<h7>Local da Manutenção</h7>
<div class="form-check">
<input class="form-check-input" type="radio" name="area"  value="interna" id="flexRadioDefault1"/>
<label class="form-check-label"for="flexRadioDefault1" >
Interna
</label>
</div>
<div class="form-check">
<input class="form-check-input" type="radio" name="area" value="externa" id="flexRadioDefault1"  />
<label class="form-check-label" for="flexRadioDefault1">
Externa
</label>
</div>

<hr>

<h7>Estado</h7>
<div class="form-check">
<input class="form-check-input" type="radio" name="estado"  value="analizando"  id="flexRadioDefault1"/>
<label class="form-check-label"for="flexRadioDefault1" >
Analizando
</label>
</div>
<div class="form-check">
<input class="form-check-input" type="radio" name="estado" value="finalizado" id="flexRadioDefault1"/>
<label class="form-check-label" for="flexRadioDefault1">
Finalizado
</label>
</div>

<hr>

<h7> Nova Ordem  de Serviço ou Retrabalho</h7>
<div class="form-check">
<input class="form-check-input" type="radio" name="trabalhore"  value="novo"  id="flexRadioDefault1"/>
<label class="form-check-label"for="flexRadioDefault1" >
Novo
</label>
</div>
<div class="form-check">
<input class="form-check-input" type="radio" name="trabalhore" value="retrabalho" id="flexRadioDefault1"/>
<label class="form-check-label" for="flexRadioDefault1">
Retrabalho
</label>
</div>

<hr>
<div class="form-group">
<label>Titulo</label>
<input type="text" name="titulo" class="form-control"  placeholder="Titulo">
</div>

<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Descrição</label>
  <textarea class="form-control" name="descricao" id="exampleFormControlTextarea1" rows="3"></textarea>
</div>

<div class="form-group">
<label>Obs</label>
<input type="text" name="obs" class="form-control cpf"  placeholder="obs">
</div>

<div class="form-group" >
<label>Data inicio</label>
<input type="date" name="datainicio" class="form-control"  placeholder="datainicio">
</div>

<div class="form-group" >
<label>Hora</label>
<input type="time" name="hora" class="form-control phone_with_ddd"  placeholder="hora">
</div>

<div class="form-group">
<label>Parecer</label>
<input type="text" name="parecer" class="form-control "  placeholder="parecer">
</div>

<div style="text-align: right">
<button type="submit" class="btn btn-sm btn-success">Cadastrar</button>
</div>

</form>
</div>
</div>

@endsection
