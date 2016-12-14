@extends('layouts.app')

@section('content')

<center>
<div class="menu">
  <a href="fill" style="margin-right: 10px;"> Пополнить счет </a>
  <a href="payment"> Оплата </a>
  <a href="purse" style="float: right;"> Создать кошелек </a>
</div>
</center>
    <div class="container">

        <div class="left-block" >
            <div class="title">Операции</div>

            <ul>
                @foreach ($transactions as $transaction)
                <li class="active" class="left-block-scroll">

                    <a href="/home/{{$transaction->trans_id}}" title="Сумма: {{$transaction->trans_pay_sum}}">
                      <div class="summa in" id="trans_id" value="{{$transaction->trans_pay_sum}}">{{$transaction->trans_pay_sum}}</div>
                      <div class="descr" id="trans_id" value="{{$transaction->trans_pay_appoint}}">{{$transaction->trans_pay_appoint}}</div>
                    </a>

                </li>
                  @endforeach
            </ul>
        </div>

        <div class="right-block">
          <input type="hidden" name="page" value="show">
            <div class="title">
              Приходная операция на сумму <b>

                    {{$trans->trans_pay_sum}}

              </b> KGS
            </div>
            <div class="content">
                    <ul>
                        <li>
                            <span class="ltext">Сумма</span>
                            <span class="rtext"><b class="in">  {{$trans->trans_pay_sum}}</b> KGS</span>
                            <div class="clear"></div>
                        </li>
                        <li>
                            <span class="ltext">Дата</span>
                            <span class="rtext">  {{$trans->created_at}}</span>
                            <div class="clear"></div>
                        </li>
                        <li>
                            <span class="ltext">Кошелек</span>
                            <span class="rtext">{{$trans->trans_pay_purse_name}}</span>
                            <div class="clear"></div>
                        </li>
                        <li>
                            <span class="ltext">Куда</span>
                            <span class="rtext">{{$trans->trans_pay_appoint}}</span>
                            <div class="clear"></div>
                        </li>
                    <ul>
					      <a href="http://public.kg:81/orgs">Перейти к заполнению таблицы "Организации"</a>
            </div>
        </div>
    </div>

@stop

@section('scripts')
<script>
function simple_tooltip(target_items, name){

$(target_items).each(function(i){

$("body").append("<div class='"+name+"' id='"+name+i+"'><p>"+$(this).attr('title')+"</p></div>");

var my_tooltip = $("#"+name+i);

$(this).removeAttr("title").mouseover(function()
{
my_tooltip.css({opacity:0.8, display:"none"}).fadeIn(400);

}).mousemove(function(kmouse)
{

my_tooltip.css({left:kmouse.pageX+15, top:kmouse.pageY+15});

}).mouseout(function(){

my_tooltip.fadeOut(400);

});

});

}

$(document).ready(function(){

simple_tooltip("a","tooltip");

});
</script>
@stop
