@extends('common.master')

@section('title', 'Drivers')

@section('heading', 'Add Drivers')

@section('sub_heading', 'Now you can add new Drivers to your Vehicle')

@section('breadcrumb')
<li><a href="{{ url('/') }}"><i class="fa fa-home"></i> Home</a></li>
<li class="active">Add Drivers</li>
@endsection


@section('content')
<div class="row">
    <div class="col-md-12">
        <!-- Custom Tabs -->
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#driver" data-toggle="tab">Drivers</a></li>
            </ul>

            <div class="tab-content">
              <div class="tab-pane active">
                <form id="form-driver" name="form-driver" method="post" action="/driver">
                    @csrf
                    <div class="form-group">
                        <label for="driverName">Driver Name</label>
                        <input type="text" class="form-control" id="driverName" name="driverName" placeholder="Enter Driver Name" required>
                    </div>

                    <div class="form-group">
                        <label for="phone">Phone No</label>
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter Pnone Number" required>
                    </div>

                    <div class="box-footer">
                        <button type="reset" class="btn btn-warning">Reset</button>
                        <button type="submit" class="btn btn-primary pull-right">Add Driver</button>
                    </div>
                </form>
              </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
        <div class="col-xs-6">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Driver Detail Table</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  
                  <th>Name</th>
                  <th>Phone Number</th>
                  <!-- <th>Status</th>
                  <th>Reason</th> -->
                </tr>
                @foreach($data as $data)
                <tr>
                    
                    <td>{{$data->Dname}}</td>
                    <td>{{$data->phoneNo}}</td>

                </tr>

                @endforeach
                
                
                
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
<script src="{{ asset('theme/bower_components/sweetalert/sweetalert.js') }}"></script>

<script type="text/javascript">
    $('#form-driver').on('submit', function(e){
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