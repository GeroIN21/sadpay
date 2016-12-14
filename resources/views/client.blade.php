@extends('layouts.app')

@section('content')


<!-- TODO: Текущие задачи -->
 @if (count($orgs) > 0)


    <div class="panel-body col-md-6 col-md-offset-3">
      <table class="table table-striped org-table">

        <!-- Заголовок таблицы -->
        <thead>
          <th>Организация | Адрес</th>
          <th>Действия с таблицами</th>
        </thead>

        <!-- Тело таблицы -->
        <tbody>
          @foreach ($orgs as $org)
            <tr>
              <td class="table-out">
                <div style="width: 100px;  float: left;"> <center> {{ $org->orgs_name }} </center></div>
                <div style="width: 70px; float: left; margin-left: 12px; margin-top: 2px;">{{ $org->orgs_adress }}</div>
              </td>

              <td>
                <!-- TODO: Кнопка Удалить -->
                <form action="/orgs/{{ $org->id }}" method="POST">
                  {{ csrf_field() }}
                  {{ method_field('DELETE') }}

                  <button style="width: 83px; float: left; margin-right: 5px;" class="buttons">Удалить</button>
                 </form>
                     <!-- TODO: Кнопка Редактировать -->
                     <button class="buttons" style="width: 120px;">
                      <a class="buttons-edit" href="orgs/{{$org->id}}/edit" style="text-align: center;"> Редактировать </a>
                       </form>
                     </button>
              </td>

            </tr>

          @endforeach
        </tbody>
      </table>
      <a href="http://public.kg:81/org"> Вернуться на страницу заполнения данных </a>
    </div>
  </div>
 @endif
@endsection
