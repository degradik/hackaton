<!DOCTYPE html>
<html>
<head>
    <title>Laravel 8 Form Example Tutorial</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
  <div class="container mt-4">
  <!-- @if(session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
  @endif -->
  <div class="card">
    <div class="card-header text-center font-weight-bold">
      Заявка для оформления кредита на юридическое лицо
    </div>
    <div class="card-body">
      <form name="add-blog-post-form" id="add-blog-post-form" method="post" action="{{url('store-form')}}">
       @csrf

        <!-- <div class="form-group">
          <label for="exampleInputEmail1">Month</label>
          <input type="text" id="month" name="month" class="form-control" required="">
        </div> -->

        <label for="exampleFormControlSelect1">Месяц</label>
        <select class="form-control" id="month" name="month">
            <option>Январь</option>
            <option>Феварль</option>
            <option>Март</option>
            <option>Апрель</option>
            <option>Май</option>
            <option>Июнь</option>
            <option>Июль</option>
            <option>Август</option>
            <option>Сентябрь</option>
            <option>Октябрь</option>
            <option>Ноябрь</option>
            <option>Декабрь</option>
        </select>

        <div class="form-group">
          <label for="exampleInputEmail1">Возраст</label>
          <input type="number" id="age" name="age" class="form-control" required="">
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Профессия</label>
          <input type="text" id="occupation" name="occupation" class="form-control" required="">
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Сумма займа</label>
          <input type="number" id="num_of_loan" name="num_of_loan" class="form-control" required="">
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">О себе</label>
          <input type="text" id="description" name="description" class="form-control" required="">
        </div>



        <button type="submit" class="btn btn-primary">Отправить</button>
      </form>
    </div>
  </div>
</div>  
</body>
</html>