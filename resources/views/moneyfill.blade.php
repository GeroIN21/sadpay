@extends('layouts.app')

@section('content')

<div class="container" >
  <span style="margin-left: 23px;"> Пополнить счет </span>

  <div class="cont-fill" style="border: dotted 3px black;">
  <form class="moneyfill" action="/moneyfill" method="POST">
    <input type="hidden" name="page" value="moneyfill">
    {{ csrf_field() }}
    <div class="name">
    <select  name="trans_pay_purse_name" id="Transaction-trans_pay_purse_name">
      @foreach ($purses as $purse)
      <option class="" value="{{$purse->purse_name}}">{{$purse->purse_name}}</option>
      @endforeach
    </select>
    </div>
    <div class="sum">
      <input type="text" name="trans_pay_sum" id="Transaction-trans_pay_sum" class="form-control" placeholder="Сумма *"  style="width: 250px; margin-bottom: 20px; margin-left: 20px;" required>
    </div>

    <div class="appoint">
      <input type="hidden" name="trans_pay_appoint" id="Transaction-trans_pay_appoint" class="form-control" value="card-transfer">
    </div>
    <div class="appoint">
      <input type="hidden" name="purse_balance" id="Purse-purse_balance" class="form-control">
    </div>
  </div>

  <button class="btn btn-default" style="margin-left: 23px; margin-top: 25px;">Пополнить</button>
  </form>
</div>
<script>
$(function(){
console.log($("#Transaction-trans_pay_purse_name")[0]);
$("#Transaction-trans_pay_purse_name")[0].mask("9999-9999-9999-9999");
});
</script>
@endsection
