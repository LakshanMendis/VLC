@extends('common.master')

@section('title', 'Tours')

@section('heading', 'Tours & Routes')

@section('sub_heading', 'Tour & route manage')

@section('breadcrumb')
<li><a href="{{ url('/') }}"><i class="fa fa-home"></i> Home</a></li>
<li class="active">Tours/Routes</li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <!-- Custom Tabs -->
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tours" data-toggle="tab">Tours</a></li>
              <li><a href="#routes" data-toggle="tab">Routes</a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tours">
                <form id="form-tours" method="post" action="/newTours">
                @csrf
                    <div class="form-group">
                        <label>Entering Date</label>
                        <div class="input-group date">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control pull-right" id="enter_date" name="enter_date" value="@php echo (date('Y-m-d')); @endphp">
                        </div>
                    </div>
                    
                    <div class="form-group" >
                        <label for="log_sheet_no">Log-sheet No</label>
                        <input type="text" class="form-control" id="log_sheet_no" name="log_sheet_no" placeholder="Enter Log-sheet No">
                        <span style="color:red" id="log"></span>
                    </div>

                    <div class="box-footer">
                        <button type="reset" class="btn btn-warning">Reset</button>
                        <button type="submit" class="btn btn-primary pull-right">Submit</button>
                    </div>
                </form>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="routes">
                <form id="form-routes" method="post" action="/newRoute">
                    @csrf
                        <!-- select -->
                    <div class="form-group">
                    <label>Vehicle No</label>
                    <select class="form-control" name="vehicle_no" id="vehicle_no">
                      <option value="" selected disabled>Select Vehicle No</option>
                      @foreach($vehiclenos as $vehicle_no)
                        <option value="{{$vehicle_no->id}}">{{$vehicle_no->vehicleNo}}</option>
                      @endforeach
                    </select>
                    </div>
                    <!-- select -->
                <div class="form-group">
                  <label>Log-Sheet No</label>
                  <select class="form-control" id="logSheet_no" name="logSheet_no">
                    <option value="" selected disabled>Select Log-Sheet No</option>
                    @foreach($logsheets as $logsheet)
                      <option value="{{$logsheet->id}}">{{$logsheet->logSheetNo}}</option>
                    @endforeach
                  </select>
                </div>

                <!-- select -->
                <div class="form-group">
                  <label>Driver</label>
                  <select class="form-control" id="driver" name="driver">
                    <option value="" selected disabled>Select Driver</option>
                    @foreach($drivers as $driver)
                      <option value="{{$driver->id}}">{{$driver->Dname}}</option>
                    @endforeach
                  </select>
                </div>

                    <div class="form-group">
                        <label>Tour Date</label>
                        <div class="input-group date">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control pull-right" id="tour_date" name="tour_date">
                        </div>
                    </div>

                    <!-- select -->
                <div class="form-group">
                  <label>From</label>
                  <select class="form-control" id="from" name="from">
                    <option value="" selected disabled>Select Location  </option>
                      @foreach($froms as $from)
                        <option value="{{$from->id}}">{{$from->cityName}}</option>
                      @endforeach

                  </select>
                </div>

                <!-- select -->
                <div class="form-group">
                  <label>To</label>
                  <select class="form-control" id="to" name="to">
                    <option value="" selected disabled>Select Location</option>
                    @foreach($tos as $to)
                        <option value="{{$to->id}}">{{$to->cityName}}</option>
                      @endforeach

                  </select>
                </div>

                    <div class="form-group">
                        <label for="log_sheet_no">Night Stop</label>
                        <input type="text" class="form-control" id="night_stop" name="night_stop" placeholder="Night Stop" required>
                    </div>

                    <div class="box-footer">
                        <button type="reset" class="btn btn-warning">Reset</button>
                        <button type="submit" class="btn btn-primary pull-right">Submit</button>
                    </div>
                </form>
              </div>
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- nav-tabs-custom -->
    </div>
</div>
@endsection

@section('stylesheet')
<!-- bootstrap datepicker -->
<link rel="stylesheet" href="{{ asset('theme/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
@endsection

@section('script')
<!-- bootstrap datepicker -->
<script src="{{ asset('theme/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>

<!-- sweetalert -->
<script src="{{ asset('theme/bower_components/sweetalert/sweetalert.js') }}"></script>

<script type="text/javascript">
    $('#enter_date').datepicker({
        autoclose: true,
        format: 'yyyy-mm-dd'
    });

    $('#tour_date').datepicker({
        autoclose: true,
        format: 'yyyy-mm-dd'
    });

    $('#log_sheet_no').on('keyup',()=>{
      $('#log').html('');
      $('#log_sheet_no').css('border', '1px green solid');
    });

    $('#form-tours').on('submit', function(e){

      e.preventDefault();

      var log_sheet = $('#log_sheet_no').val();
      
      if(log_sheet.length==0){
          $('#log').html('please enter Log Sheet No ');
          $('#log_sheet_no').css('border', '1px red solid');
          // swal("Warning","please enter Log Sheet No","warning");
      
      } else {
        var date = $('#enter_date').val();
        var sheet = $('#log_sheet_no').val();

        $.ajax({
               type:'get',
               url:'/newTours',
               error:function(r){
                 console.log(r)
               },
               data:{
                  enter_date:date,
                  log_sheet_no:sheet
               },
               success:function(data) {
                
               }
            });
            
            $('#log_sheet_no').val('');
            swal("Success","Data Inserted Successfully","success");
            // $.bootstrapGrowl("Data Inserted Successfully", // Messages
            //       { // options
            //         type: "success", // info, success, warning and danger
            //         ele: "body", // parent container
            //         offset: {
            //         from: "top",
            //         amount: 20
            //       },
            //         align: "right", // right, left or center
            //         width: 250,
            //         delay: 4000,
            //         allow_dismiss: true, // add a close button to the message
            //         stackup_spacing: 10
            //       });    
            

      }
    
    });

   

    $('#form-routes').on('submit', function(e){
      e.preventDefault();

      let form_action = $(this).prop('action');
      let form_data = $(this).serializeArray();
      let form_id = $(this).prop('id');
      
      $.ajax({
        url: form_action,
        data: form_data,
        method: 'post',
        error: function (e){
          swal("Error","Data Insert Error","error");
        }, 
        success: function (r){
          swal("Success","Data Inserted Successfully","success");
          $('#'+form_id).trigger('reset');
        }
      });
    });
</script>
@endsection