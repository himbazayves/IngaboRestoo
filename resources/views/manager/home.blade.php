@extends('layouts.manager')

@section('content')

<div class="row">
    <!-- Page Header -->
    <div class="col-lg-12">
        <h1 class="page-header">Dashboard</h1>
    </div>
    <!--End Page Header -->
</div>

<div class="row">
    <!-- Welcome -->
    <div class="col-lg-12">
        <div class="alert alert-info">
            <i class="fa fa-folder-open"></i><b>&nbsp;Hello ! </b>Welcome Back <b>{{$username}} </b>
</b>
        </div>
    </div>
    <!--end  Welcome -->
</div>


<div class="row">
    <!--quick info section -->
   
    <div class="col-lg-6">
        <div class="alert alert-success text-center">
            <i class="fa  fa-beer fa-3x"></i>&nbsp;<b>{{$restaurent}}</b> Registered restaurents 
        </div>
    </div>
   
    <div class="col-lg-6">
        <div class="alert alert-warning text-center">
            <i class="fa  fa-pencil fa-3x"></i>&nbsp;<b>{{$client}} </b> Overall  Registered Clients
        </div>
    </div>
    <!--end quick info section -->
</div>




            

</div>

@endsection