@extends('common.master')

@section('title', 'Reports')

@section('heading', 'Reports')

@section('sub_heading', 'All Records of the Business')

@section('breadcrumb')
<li><a href="{{ url('/') }}"><i class="fa fa-home"></i> Home</a></li>
<li class="active">Reports</li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <!-- Custom Tabs -->
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#toursR" data-toggle="tab">Tours Report</a></li>
              <li><a href="#transactionsR" data-toggle="tab">Transaction Report</a></li>
              <li><a href="#fuelR" data-toggle="tab">Fuel Consumption Report</a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="toursR">
                <form id="form-toursRepo" method="get" action="/newToursRepo">
                <div class="input-group">
                <select class="form-control" id="logsheet" name="logsheet">
                    <option value="" selected disabled>Select Log-Sheet No....</option>
                   @foreach($logsheets as $logsheet)
                      <option value="{{$logsheet->id}}">{{$logsheet->logSheetNo}}</option>
                    @endforeach
                    </select>
                </div>
               
              <div class="table-responsive">
                <table class="table no-margin">
                  <thead>
                  <tr>
                    <th>Date</th>
                    <th>From</th>
                    <th>To</th>
                    <th>Night Stop</th>
                  </tr>
                  </thead>
                  <tbody id="report">
                  </tbody>
                </table>
              </div>
                


                    <div class="box-footer">
                        <button type="submit" class="btn btn-success pull-right">Print
                        <i class="fa fa-print"></i>
                        </button>
                    </div>
                </form>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="transactionsR">
                <form id="form-transRepo" method="post" action="/transRepo">
                <div class="table-responsive">
                <table class="table no-margin">
                  <thead>
                  <tr>
                    
                    <th>BATA</th>
                    <th>PARKING</th>
                    <th>EXPENCES</th>
                    <th>Fuel Cost</th>
                    <th>TOTAL EXPENCES</th>
                    <th>DEPOSITED AMOUNT</th>
                    <th>PROFIT</th>
                  </tr>
                  </thead>
                  <tbody id="report">
                  
                  
                  
                  
                  </tbody>
                </table>
              </div>
               


                    <div class="box-footer">
                        <button type="submit" class="btn btn-success pull-right">Print
                            <i class="fa fa-print"></i>
                        </button>
                    </div>
                </form>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="fuelR">
                <form id="form-fuelRepo" method="post" action="/fuelRepo">
                <div class="table-responsive">
                <table class="table no-margin">
                  <thead>
                  <tr>
                    
                    <th>Log-Sheet No</th>
                    <th>Vehicle No</th>
                    <th>Total KM</th>
                    <th>Total ℓ's</th>
                    <th>Total Fuel Cost<th>
                  </tr>
                  </thead>
                  <tbody id="report">
                  
                  
                  
                  
                  </tbody>
                </table>
              </div>
               


                    <div class="box-footer">
                        <button type="submit" class="btn btn-success pull-right">Print
                            <i class="fa fa-print"></i>
                        </button>
                    </div>
                </form>
              </div>
            </div>
          </div>
    </div>
</div>
@endsection


@section('script')
<script> 
   $('#logsheet').on('change',(e)=>{

var log_ = $('#logsheet').val();
$('#report').html('');
console.log('changed',log_);
$.ajax({
    type:'get',
    url:'/newToursRepo',
    data:{
        log:log_
    },
    error:function(e){
        console.log(e);
    },
    success:function(data) {

        var rows = data[0]; 
        $.each(rows,(i,k)=>{
           $('#report').append('<tr><td>'+k.tourDate+'</td><td>'+k.cityName+'</td><td>'+k.toCity+'</td><td>'+k.nightStop+'</td></tr>')
            console.log(k);
        }); 
        console.log(rows)

    }
});
})
</script>
@endsection