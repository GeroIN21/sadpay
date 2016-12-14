@extends('layouts.app')

@section('content')

  <!-- Bootstrap шаблон... -->

  <div class="panel-body">
    <!-- Отображение ошибок проверки ввода -->
    @include('common.errors')
    <center>
    <a href="http://public.kg:81/home">
    <div>Вернуться на домашнюю страницу</div>
  </a>
</center>
<br/>
    <!-- Форма новой задачи -->
    <form action="/org" method="POST" class="form-horizontal">
      {{ csrf_field() }}

      <!-- Имя задачи -->
      <div class="form-group">
        <label for="org" class="col-sm-3 control-label"></label>

        <div class="col-sm-6">
          <input type="text" name="orgs_name" id="org-orgs_name" class="form-control" placeholder="Организация *" required>
          <input type="text" name="orgs_adress" id="org-orgs_adress" class="form-control" placeholder="Адрес организации *" required>
        </div>
      </div>

      </div>
      <!-- Кнопка добавления задачи -->
      <div class="form-group">
        <div class="col-sm-offset-3 col-sm-6">
          <center>
          <button type="submit" class="btn btn-default">
            <i class="fa fa-plus"></i> Добавить
          </button>
        </center>
        <br/>
        </div>
      </div>
    </form>



@endsection
