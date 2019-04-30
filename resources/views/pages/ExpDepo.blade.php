@extends('common.master')

@section('title', 'Expences')

@section('heading', 'Expences & Deposits')

@section('sub_heading', 'Expences and Deposits handling')

@section('breadcrumb')
<li><a href="{{ url('/') }}"><i class="fa fa-home"></i> Home</a></li>
<li class="active">Expences/Deposits</li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <!-- Custom Tabs -->
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#expences" data-toggle="tab">Expences</a></li>
              <li><a href="#fuelconsumption" data-toggle="tab">Fuel Consumption</a></li>
            </ul>

            <div class="tab-content">
              <div class="tab-pane active" id="expences" name="expences">
                <form id="form-expences" method="post" action="/newExpence">
                @csrf
                    <div class="form-group">
                    <label>Log-Sheet No</label>
                    <select class="form-control" id="logSheet_no" name="logSheet_no">
                    <option value="" selected disabled>Select Log-Sheet No</option>
                    @foreach($logsheets as $logsheet)
                      <option value="{{$logsheet->id}}">{{$logsheet->logSheetNo}}</option>
                    @endforeach
                    </select>
                    </div>

                    <div class="form-group">
                        <label for="log_sheet_no">BATA</label>
                        <input type="text" class="form-control" id="bata" name="bata" placeholder="Enter BATA Amount" required>
                    </div>

                    <div class="form-group">
                        <label for="log_sheet_no">Parking</label>
                        <input type="text" class="form-control" id="parking" name="parking" placeholder="Enter Parking Amount" required>
                    </div>


                    
                    <div class="form-group">
                        <label for="log_sheet_no">Expences</label>
                        <input type="text" class="form-control" id="expences" name="expences" placeholder="Enter Expences Amount" required>
                    </div>

                    <div class="form-group">
                        <label for="log_sheet_no">Deposited Amount</label>
                        <input type="text" class="form-control" id="deposit" name="deposit" placeholder="Enter Deposited Amount" required>
                    </div>

                    <div class="form-group">
                        <label>Deposited Date</label>
                        <div class="input-group date">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control pull-right" id="depo_date" name="depo_date">
                        </div>
                    </div>

                    <div class="box-footer">
                        <button type="reset" class="btn btn-warning">Reset</button>
                        <button type="submit" class="btn btn-primary pull-right">Submit</button>
                    </div>
                </form>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane"  id="fuelconsumption" name="fuelconsumption">
                <form id="form-fuelcon" name="form-fuelcon" method="post" action="/fuelconsumption">
                @csrf
                    <div class="form-group">
                    <label>Log-Sheet No</label>
                    <select class="form-control" id="logSheet_no_1" name="logSheet_no">
                    <option value="" selected disabled>Select Log-Sheet No</option>
                    @foreach($logsheets as $logsheet)
                      <option value="{{$logsheet->id}}">{{$logsheet->logSheetNo}}</option>
                    @endforeach
                    </select>
                    </div>

                    <div class="form-group">
                        <label for="vehicle">Vehicle No</label>
                        <input type="text" class="form-control" id="vehicle" name="vehicle" placeholder="Vehicle will be selected" required>
                    </div>                 

                    <div class="form-group">
                        <label for="start">Start Meter</label>
                        <input type="text" class="form-control" id="start" name="start" placeholder="Enter Start Meter" required>
                    </div>

                    <div class="form-group">
                        <label for="end">End Meter</label>
                        <input type="text" class="form-control" id="end" name="end" placeholder="Enter End Meter" required>
                    </div>

                    <div class="form-group">
                        <label for="totalKM">Total KM</label>
                        <input type="text" class="form-control" id="totalKM" name="totalKM" placeholder="Total Kilo Meters" required>
                    </div>

                    <div class="form-group">
                        <label for="litres">Litres(ℓ's) per Route</label>
                        <input type="text" class="form-control" id="litres" name="litres" placeholder="ℓ's per Route" required>
                    </div>

                    <div class="form-group">
                        <label for="litrePrice">Fuel Price per Litre(ℓ)</label>
                        <input type="text" class="form-control" id="litrePrice" name="litrePrice" placeholder="Enter Fuel ℓ" required>
                    </div>

                    <div class="form-group">
                        <label for="totFuelCost">Approximate Fuel Cost</label>
                        <input type="text" class="form-control" id="totFuelCost" name="totFuelCost" placeholder="Total Fuel Cost" required>
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

<script type="text/javascript"></script>

  var kml = 0;

    $('#depo_date').datepicker({
        autoclose: true,
        format: 'yyyy-mm-dd'
    });

    $('#form-expences').on('submit', function(e){
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

    $('#form-fuelcon').on('submit', function(e){
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

    $('#logSheet_no_1').on('change',(e)=>{
      var log = $('#logSheet_no_1').val();
      $.ajax({
        type:'get',
        url:'/getvehicle',
        data:{
          lg:log
        },
        error:function(r){
            console.log(r)
        },
        success:function(r){
          var data = r['vehicle'];
          console.log(data.vehicleNo);
          $('#vehicle').val(data.vehicleNo)

          kml = data.kml;
          console.log(kml);
        }

      });
    })

    $('#end').on('keyup',(e)=>{
      var data1 = $('#start').val();
      var data2 = $('#end').val();
      var tot = data2 - data1
      $('#totalKM').val(tot);

      var lit = tot/kml;
      $('#litres').val(lit);


      $('#litrePrice').on('keyup',(e)=>{
      var fuelRs = $('#litrePrice').val();
      var cost = lit*fuelRs;
      $('#totFuelCost').val(cost);
      });
    });

   

</script>
@endsection