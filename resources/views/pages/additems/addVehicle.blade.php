@extends('common.master')

@section('title', 'Vehicles')

@section('heading', 'Add Vehicles')

@section('sub_heading', 'Now you can add new vehicles')

@section('breadcrumb')
<li><a href="{{ url('/') }}"><i class="fa fa-home"></i> Home</a></li>
<li class="active">Add Vehicles</li>
@endsection


@section('content')
<div class="row">
    <div class="col-md-12">
        <!-- Custom Tabs -->
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#vehicles" data-toggle="tab">Vehicles</a></li>
              
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="vehicles">
                <form id="form-vehicles" name="form-vehicles" method="post" action="/vehicles">
                @csrf
                    <!-- <div class="form-group">
                        <label>Entering Date</label>
                        <div class="input-group date">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control pull-right" id="enter_date" name="enter_date">
                        </div>
                    </div> -->
                    
                    <div class="form-group">
                        <label for="vehicle_no">Vehicle No</label>
                        <input type="text" class="form-control" id="vehicle_no" name="vehicle_no" placeholder="Enter Vehicle No" required>
                    </div>

                    <div class="form-group">
                        <label for="vehicle_type">Vehicle type</label>
                        <input type="text" class="form-control" id="vehicle_type" name="vehicle_type" placeholder="Enter Vehicle Name" required>
                    </div>

                    <div class="form-group">
                        <label for="kml">Kilo Meters per litre</label>
                        <input type="text" class="form-control" id="kml" name="kml" placeholder="Enter Kilo meters per Litre" required>
                    </div>
                    


                    <div class="box-footer">
                        <button type="reset" class="btn btn-warning">Reset</button>
                        <button type="submit" class="btn btn-primary pull-right">Add to Cart</button>
                    </div>
                </form>
              </div>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="box">
            <div class="box-header">
              <h3 class="box-title">Vehicle Detail Table</h3>

              <!-- <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div> -->
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table id="table-vehicle" class="table table-hover table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Vehicle Number</th>
                        <th>Vehicle Type</th>
                        <th>KMs/Litre</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($data as $data)
                    <tr>
                        <td>{{$data->vehicleNo}}</td>
                        <td>{{$data->vechicleType}}</td>
                        <td>{{$data->kml}}</td>
                    </tr>
                @endforeach
                </tbody>
              </table>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
</div>
</section>
<!-- /.content -->
@endsection

@section('script')
<!-- sweetalert -->
<script src="{{ asset('theme/bower_components/sweetalert/sweetalert.js') }}"></script>

<script type="text/javascript">
    $('#form-vehicles').on('submit', function(e){
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