<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Paint Job</title>
        <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
        <link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
        <link rel="stylesheet" href="{{asset('plugins/toastr/toastr.min.css')}}">
        <link rel="stylesheet" href="{{asset('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">
        <link rel="stylesheet" href="{{asset('plugins/select2/css/select2.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/adminlte.min.css')}}">

        <script src="{{asset('js/jquery.min.js')}}" charset="utf-8"></script>
        <script src="{{asset('js/bootstrap.min.js')}}" charset="utf-8"></script>
        <script src="{{asset('plugins/datatables/jquery.dataTables.js')}}" charset="utf-8"></script>
        <script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}" charset="utf-8"></script>
        <script src="{{asset('plugins/toastr/toastr.min.js')}}" charset="utf-8"></script>
        <script src="{{asset('plugins/sweetalert2/sweetalert2.min.js')}}" charset="utf-8"></script>
        <script src="{{asset('plugins/select2/js/select2.full.min.js')}}" charset="utf-8"></script>
        <script src="{{asset('plugins/inputmask/jquery.inputmask.bundle.js')}}" charset="utf-8"></script>
        <script src="{{asset('js/adminlte.min.js')}}" charset="utf-8"></script>
        <script src="{{ asset('js/app.js') }}" defer></script>

        <style media="screen">

          .nav_class{
            background-color: #ff695e;
          }

          .banner{
            background-color: #d1cfcf;
            height: 200px;
            display: flex;
            justify-content: center;
            align-items: center;
          }

          .banner h1{
            color: #6b6b6b;
          }

          .main_body{
            margin-top: 2%;
          }

          .main_form{
            padding: 20px 50px 50px;
          }

          .right_car_img_container, .left_car_img_container{
            display: flex;
            justify-content: center;
            align-items: center;
          }

          #plate{
            text-transform: uppercase;
          }

          #plate, #current_color, #new_color{
            width: 30%;
          }

          .btn_submit{
            background-color: #ff695e;
            color: white;
            width: 200px;
          }

          .progress_table thead, .queue_table thead{
            background-color: #c9c9c9;
          }

          .card-header{
            background-color: #ff695e;
          }

          .card-title{
            color: white;
          }

          .total_cars_painted{
            text-align: right;
            font-weight: bold;
          }

          .color_breakdown{
            margin-left: 20px;
          }

          .color_blue, .color_red, .color_green{
            text-align: right;
            font-weight: bold;
          }

          .complete_button{
            color: #ff695e;
            font-weight: bold;
          }

          .modal-header{
            background-color: #ff695e;
          }

        </style>
    </head>
    <body>
      <div class="wrapper" id="app">
        @include('layouts.navbar')
          @yield('content')
      </div>
    </body>
</html>

<script>

$(function(){
  $(".progress_table").DataTable();
  $(".queue_table").DataTable();
  $(".plate_no").inputmask("*** ***");
});

</script>


















{{--  --}}
