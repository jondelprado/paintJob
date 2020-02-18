@extends('layouts.app')


@section('content')

  <div class="container-fluid">

    <div class="row">

      <div class="col-lg-12 main_body">

        <div class="text-center">
          <h2 style="font-weight: bold;">New Paint Job</h2>
        </div>

        <div class="row">

          <div class="col-lg-12">

            <div class="row">

              <div class="col-lg-5 left_car_img_container">
                <img class="left_car_img" src="{{'img/default.png'}}" alt="">
              </div>

              <div class="col-lg-2">

              </div>

              <div class="col-lg-5 right_car_img_container">
                <img class="right_car_img" src="{{'img/default.png'}}" alt="">
              </div>

            </div>


          </div>

          <div class="col-lg-12 main_form">

            <h3>Car Details</h3><br>

            <form action="{{action('ProgressController@store')}}" method="post">

              {{csrf_field()}}

              <div class="form-group">

                <div class="row">

                  <div class="col-lg-2">
                    <label>Plate No.</label>
                  </div>

                  <div class="col-lg-10">
                    {{-- <input id="plate" type="text" class="form-control" name="plate_number"><br> --}}
                    <input id="plate" type="text" class="form-control text-left plate_no" name="plate_number"><br>
                  </div>

                  <div class="col-lg-2">
                    <label>Current Color</label>
                  </div>

                  <div class="col-lg-10">
                    <select id="current_color" class="select2 form-control" name="current_color">
                      <option value=""></option>
                      <option value="Red">Red</option>
                      <option value="Green">Green</option>
                      <option value="Blue">Blue</option>
                    </select><br>
                  </div>

                  <div class="col-lg-2">
                    <label>Target Color</label>
                  </div>

                  <div class="col-lg-10">
                    <select id="new_color" class="select2 form-control" name="target_color">
                      <option value=""></option>
                      <option value="Red">Red</option>
                      <option value="Green">Green</option>
                      <option value="Blue">Blue</option>
                    </select><br>
                  </div>

                  <input type="submit" class="btn btn_submit" value="Submit">

                </div>

              </div>

            </form>


          </div>

        </div>

      </div>

    </div>

  </div>



<script>

  $(".btn_submit").on("click", function(e){

    var plateNumber = $("[name='plate_number']").val();
    var currentColor = $("[name='current_color']").val();
    var targetColor = $("[name='target_color']").val();

    if (plateNumber == "" || currentColor == "" || targetColor == "") {
      e.preventDefault();
      Swal.fire({
        title: "Empty Field(s)",
        text: "Please fill up all the required fields.",
        type: "error"
      });
    }

    if (plateNumber == "") {
      $("[name='plate_number']").css('border-color', 'red');
    }

    if (currentColor == "") {
      $("[name='current_color']").css('border-color', 'red');
    }

    if (targetColor == "") {
      $("[name='target_color']").css('border-color', 'red');
    }

    if (currentColor == targetColor && targetColor != "" && currentColor != "") {

      e.preventDefault();

      Swal.fire({
        title: "Same Color not Allowed!",
        text: "Please change Target Color different from Current Color.",
        type: "error"
      });

    }

  });

  $("[name='plate_number']").on("keyup", function(){

    if ($(this).val() != "") {
      $(this).css('border-color', 'lightgreen');
    }
    else {
      $(this).css('border-color', 'red');
    }

  });

  $("[name='current_color']").on("change", function(){

    if ($(this).val() != "") {
      $(this).css('border-color', 'lightgreen');
    }
    else {
      $(this).css('border-color', 'red');
    }

  });


  $("[name='target_color']").on("change", function(){

    if ($(this).val() != "") {
      $(this).css('border-color', 'lightgreen');
    }
    else {
      $(this).css('border-color', 'red');
    }

  });


  $("[name='current_color']").on("change", function(){

    if ($(this).val() == "red") {

      $(".left_car_img").attr('src', 'img/red.png');

    }

    if ($(this).val() == "green") {

      $(".left_car_img").attr('src', 'img/green.png');

    }

    if ($(this).val() == "blue") {

      $(".left_car_img").attr('src', 'img/blue.png');

    }

    if ($(this).val() == "") {

      $(".left_car_img").attr('src', 'img/default.png');

    }

  });

  $("[name='target_color']").on("change", function(){

    if ($(this).val() == "red") {

      $(".right_car_img").attr('src', 'img/red.png');

    }

    if ($(this).val() == "green") {

      $(".right_car_img").attr('src', 'img/green.png');

    }

    if ($(this).val() == "blue") {

      $(".right_car_img").attr('src', 'img/blue.png');

    }

    if ($(this).val() == "") {

      $(".right_car_img").attr('src', 'img/default.png');

    }

  });

</script>



{{--  --}}
@endsection
