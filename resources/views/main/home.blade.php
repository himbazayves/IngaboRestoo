@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div  class="alert col-md-12">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
        Muraho! murakaza neza {{ $user_id = Auth::user()->name}}
          </div>



        <div style="background:#FCBF1E" class="col-md-4 alert alert-success">
            <div  style="background:#FCBF1E" class="card alert">
            <div class="card-header">Ufute resitora {{$res}}</div>
           

                <div class="card-body">
                    
                </div>
            </div>
        </div>


        <div class="col-md-4 alert">
            <div class="card alert">
            <div class="card-header">Umaze kwandika abakiliya {{$cli}}</div>

                <div class="card-body">
                    
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
