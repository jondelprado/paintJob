@extends('layouts.app')

@section('content')

  <div class="container-fluid">

    <div class="row">

      <div class="col-lg-12 main_body">

        <div class="text-center">
          <h2 style="font-weight: bold;">Paint Jobs</h2><br>
        </div>

      </div>

      <div class="col-lg-12">

        <div class="row">

          <div class="col-lg-12">
            <h5>Paint Jobs In Progress</h5><br>
          </div>

          <div class="col-lg-8">

            <table class="table table-bordered table-hover progress_table">
                <thead>
                  <tr>
                    <th>Plate No.</th>
                    <th>Current Color</th>
                    <th>Target Color</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody class="progress_body">

                </tbody>
            </table><br>

          </div>

          <div class="col-lg-4">

            <div class="card">

              <div class="card-header">

                <div class="card-title">

                  <h5>SHOP PERFORMANCE</h5>

                </div>

              </div>

              <div class="card-body">

                <div class="row">

                  <div class="col-lg-8">
                    <label>Total Cars Painted:</label>
                  </div>

                  <div class="col-lg-4">
                    <p class="total_cars_painted">

                    </p>
                  </div>

                  <div class="col-lg-8">
                    <label>Breakdown:</label>
                    <div class="color_breakdown">
                      <label>Blue</label><br>
                      <label>Red</label><br>
                      <label>Green</label>
                    </div>
                  </div>

                  <div class="col-lg-4">
                    <br>
                    <p class="color_blue">2</p>
                    <p class="color_red">2</p>
                    <p class="color_green">3</p>
                  </div>

                </div>

              </div>

            </div>

          </div>

          <hr>

          <div class="col-lg-12">
            <h5>Paint Queue</h5><br>
          </div>

          <div class="col-lg-8">

            <table class="table table-bordered table-hover queue_table">
              <thead>
                <tr>
                  <th>Plate No.</th>
                  <th>Current Color</th>
                  <th>Target Color</th>
                </tr>
              </thead>
              <tbody class="queue_body">

              </tbody>
            </table>

          </div>

        </div>

      </div>

    </div>

  </div>

  <script>

      $.ajaxSetup({

          headers: {

              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

          }

      });


      var interval = 5000;

      function refreshBlock(){

        $.ajax({
          type: "post",
          url: "http://localhost/paintJob/public/paint-jobs/performance",
          dataType: "json",
          success:function(data){
            $.each(data, function(i){
              $(".total_cars_painted").html(data[i].total);
              $(".color_blue").html(data[i].blue);
              $(".color_red").html(data[i].red);
              $(".color_green").html(data[i].green);
              // console.log(data[i].total);
            });
          },
          complete:function(data){
            setTimeout(refreshBlock, interval);
          }
        });

      }

      var jobID = "";

      function refreshProgress(){

        $.ajax({
          type: "post",
          url: "http://localhost/paintJob/public/paint-jobs/progress",
          dataType: "json",
          success:function(data){

            $(".progress_body").html("");

            $.each(data, function(i){

              var html = '<tr>'
                          +'<td>'+data[i].plate+'</td>'
                          +'<td>'+data[i].current_color+'</td>'
                          +'<td>'+data[i].target_color+'</td>'
                          +'<td><a class="complete_button" id="'+data[i].id+'" href="#">Mark as Completed</a></td>'
                         +'</tr>';

              $(".progress_body").append(html);

            });

            $(".complete_button").on("click", function(){

              jobID = $(this).attr('id');

              completeJob();

            });

          },
          complete:function(data){
            setTimeout(refreshProgress, interval);
          }
        });

      }

      function refreshQueue(){

        $.ajax({
          type: "post",
          url: "http://localhost/paintJob/public/paint-jobs/queue",
          dataType: "json",
          success:function(data){

            $(".queue_body").html("");

            $.each(data, function(i){

              var html = '<tr>'
                          +'<td>'+data[i].plate+'</td>'
                          +'<td>'+data[i].current_color+'</td>'
                          +'<td>'+data[i].target_color+'</td>'
                         +'</tr>';

              $(".queue_body").append(html);

            });
          },
          complete:function(data){
            setTimeout(refreshQueue, interval);
          }
        });

      }

      function completeJob(){

        $.ajax({
          type: "post",
          url: "http://localhost/paintJob/public/paint-jobs/complete",
          data: {jobID:jobID},
          dataType: "json",
          complete:function(){
            Swal.fire({
              title: "Paint Job Completion",
              text: "Job Completed Successfully!",
              type: "success",
            }).then(function(isConfirm) {
                if (isConfirm) {
                  location.reload();
                }
              });

          }
        });

        // console.log(jobID);

      }

      refreshBlock();
      refreshProgress();
      refreshQueue();

  </script>

@endsection








{{--  --}}
