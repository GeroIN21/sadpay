@extends('layouts.app')

@section('content')


<!-- TODO: Текущие задачи -->
<center>

  <form action="{{ url('orgs/'.$orgs->id) }}" method="POST">
    {{ csrf_field() }}
    {{ method_field('PUT') }}
    <div class="form-group">
      <label for="orgs" class="col-sm-3 control-label"></label>

      <div class="col-sm-6">
        <input type="text" name="orgs_name" id="orgs-orgs_name" value="{{ $orgs->orgs_name }}" class="form-control"  required>
        <input type="text" name="orgs_adress" id="orgs-orgs_adress" value="{{ $orgs->orgs_adress }}" class="form-control"  required>
      </div>
    </div>

    <div class="form-group">
      <div class="col-sm-offset-3 col-sm-6">
        <center>
          <br/>
        <button type="submit" class="btn btn-default">
          <i class="fa fa-plus"></i> Редактировать
        </button>
      </center>
      <br/>
      </div>
    </div>

   </form></center>
@endsection
