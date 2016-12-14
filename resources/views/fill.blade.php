@extends('layouts.app')

@section('content')

<div class="container" >
  <span style="margin-left: 23px;"> Пополнить счет </span>

  <div class="cont-fill">
  <form class="fill" action="/fill" method="POST">
    {{ csrf_field() }}
  <div class="name">
    <input type="text" name="card_num" id="org-card_num" class="form-control" placeholder="Номер карты *"
  class="name" required>
    <script>

$(function(){
  $("#org-card_num").mask("9999-9999-9999-9999");
});

</script>

  </div>

  <div class="">
    <input type="text" name="card_ccv" id="org-card_ccv" class="form-control CCV" placeholder="CCV *"   required>
  </div>

  <div class="exp-date">
      <input type="text" name="card_date" id="org-card_date" class="form-control" placeholder="Дата окончания *"   required>
  </div>


    <div class="purse_id">
        <input type="hidden" name="purse_id" id="org-purse_id" class="form-control">
      </div>

<br/>
<button class="btn btn-default" style="margin-left: 23px; margin-top: 25px;">
  Пополнить
</button>
</form>
</div>

</div>

@endsection
