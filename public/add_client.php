@extends('layouts.app')

@section('content')

  <!-- Bootstrap шаблон... -->

  <div class="panel-body">
    <!-- Отображение ошибок проверки ввода -->


    <!-- Форма новой задачи -->
    <form action="/org" method="POST" class="form-horizontal">
      {{ csrf_field() }}

      <!-- Имя задачи -->
      <div class="form-group">
        <label for="org" class="col-sm-3 control-label">Организации </label>

        <div class="col-sm-6">
          <input type="text" name="orgs_name" id="org-orgs_name" class="form-control">
          <input type="text" name="orgs_adress" id="org-orgs_adress" class="form-control">
        </div>
      </div>

      </div>
      <!-- Кнопка добавления задачи -->
      <div class="form-group">

        <div class="col-sm-offset-3 col-sm-6">
          <button type="submit" class="btn btn-default">
            <i class="fa fa-plus"></i>  Добавить
          </button>
        </div>
      </div>
    </form>
  </div>

  <!-- TODO: Текущие задачи -->
   @if (count($orgs) > 0)


      <div class="panel-body">
        <table class="table table-striped org-table">

          <!-- Заголовок таблицы -->
          <thead>
            <th>Организации</th>
            <th>&nbsp;</th>
          </thead>

          <!-- Тело таблицы -->
          <tbody>
            @foreach ($orgs as $org)
              <tr>
                <!-- Имя задачи -->
                <td class="table-text">
                  <div>{{ $org->orgs_name }}</div>
                  <div>{{ $org->orgs_adress }}</div>
                </td>

                <td>
                  <!-- TODO: Кнопка Удалить -->
                  <form action="/org/{{ $org->id }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}

                    <button>Удалить</button>
                   </form>
                       <!-- TODO: Кнопка Редактировать -->
                  <form action="/org/{{ $org->id }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('UPDATE') }}

                    <button>Редактировать</button>
                   </form>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
   @endif
@endsection
