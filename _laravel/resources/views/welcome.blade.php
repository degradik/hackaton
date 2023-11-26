<!DOCTYPE html>
<html>
<head>
    <title>Laravel 8 Form Example Tutorial</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
      body{
        background: #f1f3f8;
      }
      .card{
        background: #f1f3f8;
      }
      .card-header p{
        margin: 0;
        font-size: 18px;
        color: #6cb657;
      }
      .btn-primary{
        background-color: #6cb657;
        border-color: #6cb657;
      }
      .btn-primary:hover{
        background-color: #7ec16b;
        border-color: #7ec16b;
      }
    </style>
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
      <p>Заявка для оформления кредита на юридическое лицо</p>
    </div>
    <div class="card-body">
      <form name="add-blog-post-form" id="add-blog-post-form" method="post" action="{{url('store-form')}}">
       @csrf

        <!-- <div class="form-group">
          <label for="exampleInputEmail1">Month</label>
          <input type="text" id="month" name="month" class="form-control" required="">
        </div> -->

        <div class="form-group">
          <label for="exampleInputEmail1">Ежемесечный доход</label>
          <input type="number" id="monthly_income" name="monthly_income" class="form-control" required="">
        </div>

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