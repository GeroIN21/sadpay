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
