@extends('layouts.main')

@section('content')
<div style="margin-top:100px" class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="alert alert-success"> Kugenzura niba imeli wakoresheje ari iyawe</div>
            <div class="card">
               
                <div class="card-body">
                    @if (session('resent'))
                     
                

                            <div style="background: green" class="alert  alert-dismissible">
                                <button type="button" class="close text-danger" data-dismiss="alert">&times;</button>
                                <strong class="text-light" > Tumaze kukoherereza link shyashya!reba muri imeli yawe uyikandeho!</strong>    
                              </div>
                      
                    @endif

               
                    Mbere yuko ukomeza turagenzura niba imeli ari iyawe! reba muri imeli yawe twakoherereje link ukandaho.
                 Niba ntayo wabonye,
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">Kanda hano tuguhe iyindi</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
