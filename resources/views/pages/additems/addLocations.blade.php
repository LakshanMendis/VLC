@extends('common.master')

@section('title', 'Locations')

@section('heading', 'Add Locations')

@section('sub_heading', 'Now you can add new Locations to your route')

@section('breadcrumb')
<li><a href="{{ url('/') }}"><i class="fa fa-home"></i> Home</a></li>
<li class="active">Add Locations</li>
@endsection


@section('content')
<div class="row">
    <div class="col-md-12">
        <!-- Custom Tabs -->
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#locations" data-toggle="tab">Locations</a></li>
              
            </ul>
            <div class="tab-content">
              <div class="tab-pane active">
                <form id="form-locations" name="form-locations" method="post" action="/locations">
                @csrf
                    
                    <div class="form-group">
                        <label for="location">Location Name</label>
                        <input type="text" class="form-control" id="location" name="location" placeholder="Enter Location Name" required>
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
</div>

@endsection


@section('script')
<!-- sweetalert -->
<script src="{{ asset('theme/bower_components/sweetalert/sweetalert.js') }}"></script>

<script type="text/javascript">
    $('#form-locations').on('submit', function(e){
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