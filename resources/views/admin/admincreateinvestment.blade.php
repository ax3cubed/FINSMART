@extends('layouts.app')
@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Investment</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href=".">Home</a></li>
            <li class="breadcrumb-item active">Create New Investment Account</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <div class="row">
    <div class="col-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Search Client</h3>
            <div style="float:right"> 
                <form method="POST" action="/search" role="search">
                 {{ csrf_field() }}
                <table>
                  <tr><td><input type="search" name="q" class="form-control" placeholder="Enter Keyword" required></td>
                  <td><button type="submit" class="btn btn-outline-warning"><i class="fa fa-search"></i> Search Client </button></td>
                  </tr>
                </table>
                </form>
                </div>
        </div>
        <?php 
        $details = session()->get('details');
        if($details){
        ?>
        <div class="card-body">
            <table id="example4" class="table table-bordered table-striped">
                <thead>
                    <tr>
                      <th>Surname</th>
                      <th>Other Names</th>
                      <th>E-mail</th>
                      <th>Phone No</th>
                      <th>Address</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                   
                    @csrf
                    @foreach($details as $user)
                    <tr>
                      <td>{{$user->surname}}</td>
                      <td>{{$user->othername}}</td>
                      <td>{{$user->email}}</td>
                      <td>{{$user->phone}}</td>
                      <td>{{$user->address}}</td>
                      <td>
                        <form method="post" action="/searchinvform"> 
                            @csrf
                          <button class="btn btn-outline-primary btn-xs" value="{{$user->userid}}" name="CreateNew">Create New</button>
                        </form>
                    </td>
                    </tr>  
                      @endforeach           
                    </tbody>
            </table>
        </div>
    <?php } ?>
    </div>
    </div>  
    </div>
    @if(count($data) > 0)
    <div class="row">
        <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Clients</h3>
                <div style="float:right">
                    <form method="post" action="/viewclientdetails">
                      @csrf
                      <input name="viewclientprofile" type="hidden" value="{{$user->userid}}">
                      <button type="submit" class="btn btn-sm btn-outline-success">Profile</button>
                    </form> 
                   </div>
            </div>
            <div class="card-body">
                <table id="example3" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Surname</th>
                            <th>Other Names</th>
                            <th>Phone No</th>
                            <th>Address</th>          
                          </tr>
                    
                    </thead>
                    @foreach($data as $info)
                    <tbody>
                       
                        <tr>
                            <td>{{$info->surname}}</td>
                            <td>{{$info->othername}}</td>
                            <td>{{$info->phone}}</td>
                            <td>{{$info->address}}</td>         
                          </tr> 
                         
                    </tbody>
                    @endforeach 
                    
                  </table>
              
            </div>
        </div>
        </div>  
    </div>
    <div>
        <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Client Investment Account</h3>
            </div>
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Capital</th> 
                            <th>Interest</th>
                            <th>Total Return</th>
                            <th>Tenure</th>
                            <th>Application Date </th>
                            <th>Status </th>
                            <th>Action </th>
                          </tr>
                        </thead>
                        <tbody>
                        
                     
                        @foreach($invest as $dat)
                          <tr>
                            <td>₦{{number_format($dat->amount,2)}}</td>
                            <td>₦{{number_format($dat->interest,2)}}</td>
                            <td>₦{{number_format($dat->amount+$dat->interest,2)}}</td>
                            <td>{{$dat->tenure}} Days</td>
                            <td>{{ $dat->created_at }}</td>
                            <td><?php echo $status ?></td>        
                             <td>
                                <form method="post" action="{{ route('ViewUserInvestment') }}"> 
                                    @csrf
                                 <button class="btn btn-primary btn-xs" name="ManageInvestment"
                                  value="{{$dat->ref}}">Manage</button>
                                </form>
                            </td>
                           
                          </tr> 
                          @endforeach               
                        </tbody>   
                  </table>
            </div>
        </div>
        </div>  
    </div>
    <div class="row">
        <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Investment Application</h3>
            </div>
            <div class="card-body display_form">
                <form method="post" onsubmit="showForm()" enctype="multipart/form-data" action="{{ route('calculateinv') }}">
                    @csrf
                    <div class="row">

                    
                          <div class="col-md-4">
                            <div class="form-group">
                              <label>Investment Type</label>
                              <select name="productkey" class="form-control" required >
                                <option value="" disabled selected> Select Option...</option>
                                    @foreach($products as $product)
                                <option  value="{{$product->id}}">{{$product->product}}</option>
                                    @endforeach
                              </select>
                            </div>
                          </div>
                      
                      <div class="col-md-4">
                        <div class="form-group">
                          <label>Investment Amount</label>
                          <input type="number" name="amount" id="Text1" class="form-control" placeholder="Enter Investment Amount" required >
                        </div>
                      </div> 
                      <div class="col-md-4">
                      <div class="form-group">
                        <label>Interest Rate (%)</label>
                        <input type="text" name="rate" id="Text2" class="form-control" value=""  placeholder="Interest Rate" required>                    
                      </div>
                      </div>    
                      <div class="col-md-4">
                      <div class="form-group">
                        <label>Investment Tenure</label>
                          <select name="tenure" class="form-control select2" id="Text3" onchange="add_number()" required>
                          <option value="">Select Tenure...</option>
                          <option value="30">30 Days</option>
                          <option value="60">60 Days</option>
                          <option value="90">90 Days</option>
                          <option value="120">120 Days</option>
                          <option value="150">150 Days</option>
                          <option value="180">180 Days</option>
                          <option value="210">210 Days</option>
                          <option value="240">240 Days</option>
                          <option value="270">270 Days</option>
                          <option value="300">300 Days</option>
                          <option value="330">330 Days</option>
                          <option value="360">360 Days</option>
                          </select>                       
                      </div>
                      </div>
                      <div class="col-md-9"></div>
                    </div>
                      <div class="col-md-3">
                      <div class="form-group">
                        <button type="submit" class="btn btn-outline-primary btn-block">Calculate Investment Details
                        </button>
                      </div>
                    </div>
                </div>
              </form>
            </div>
        </div>
        </div>  
    
    @endif


<?php $dataa = session()->get('d'); 
 if(!empty($dataa)){ ?>
 <div class="card">
 <div class="row">
                <div class="col-lg-4">
                    <div class="card-header"> <h4>INVESTMENT STATISTICS</h4></div>
                   <div class="card-body">
                    <form action="/adminsubmitinvestment" method="POST">
                        @csrf
                        <input type="hidden" name="amount" value="{{session()->get('amount')}}">
                        <input type="hidden" name="tenure" value="{{session()->get('tenure')}}">
                        <input type="hidden" name="rate" value="{{session()->get('rate')}}">
                        <table class="table">
                            <tr><th>Investment Amount</th><td>₦{{session()->get('amount')}}</td></tr> 
                            <tr><th>Investment Tenure</th><td>{{session()->get('tenure')}} Days</td></tr> 
                            <tr><th>Monthly Interest Rate</th><td><?php echo $dataa->interest ?>%</td></tr>
                            <tr><th>Yearly Interest Rate</th><td><?php echo $dataa->interest*12 ?>%</td></tr>
                            <tr><th>Interest Value</th><td>₦<?php 
                              $int = session()->get('amount')*$dataa->interest*session()->get('tenure')/100/30; 
                               echo number_format($int,2) ?></td></tr>
                            <tr><th>VAT on Investment Interest</th><td><?php $vat = $int*$dataa->vat/100;   echo number_format($vat,2) ?> (<?php echo $dataa->vat ?>%)</td></tr>  
                             <tr><th>Total Return</th><td><?php $exp = session()->get('amount')+$int-$vat; echo number_format($exp,2) ?></td></tr>
                          </table>
                    </div>
                    <div>
                        <button type="submit" style="float:right" class="btn btn-outline-primary btn-md">SUBMIT APPLICATION</button>
                    </div>
                </div>
               
               
            </form>

          
 </div>
   </div>

   
 <?php } ?>

 <script>
      function showForm(){
        $('.display_form').html(
            '<div class="card-body">
                <form method="post" onsubmit="showForm()" enctype="multipart/form-data" action="{{ route('calculateinv') }}">
                    @csrf
                          <div class="col-md-12">
                            <div class="form-group">
                              <label>Investment Type</label>
                              <select name="productkey" class="form-control" required >
                                <option value="" disabled selected> Select Option...</option>
                                    @foreach($products as $product)
                                <option  value="{{$product->id}}">{{$product->product}}</option>
                                    @endforeach
                              </select>
                            </div>
                          </div>
                      
                      <div class="col-md-4">
                        <div class="form-group">
                          <label>Investment Amount</label>
                          <input type="number" name="amount" id="Text1" class="form-control" placeholder="Enter Investment Amount" required >
                        </div>
                      </div> 
                      <div class="col-md-4">
                      <div class="form-group">
                        <label>Interest Rate (%)</label>
                        <input type="text" name="rate" id="Text2" class="form-control" value=""  placeholder="Interest Rate" required>                    
                      </div>
                      </div>    
                      <div class="col-md-4">
                      <div class="form-group">
                        <label>Investment Tenure</label>
                          <select name="tenure" class="form-control select2" id="Text3" onchange="add_number()" required>
                          <option value="">Select Tenure...</option>
                          <option value="30">30 Days</option>
                          <option value="60">60 Days</option>
                          <option value="90">90 Days</option>
                          <option value="120">120 Days</option>
                          <option value="150">150 Days</option>
                          <option value="180">180 Days</option>
                          <option value="210">210 Days</option>
                          <option value="240">240 Days</option>
                          <option value="270">270 Days</option>
                          <option value="300">300 Days</option>
                          <option value="330">330 Days</option>
                          <option value="360">360 Days</option>
                          </select>                       
                      </div>
                      </div>
                      <div class="col-md-9"></div>
                      <div class="col-md-3">
                      <div class="form-group">
                        <button type="submit" class="btn btn-outline-primary btn-block"> Calculate Investment Details
                        </button>
                      </div>
                    </div>
                </div>'
        )
      }
 </script>

@endsection