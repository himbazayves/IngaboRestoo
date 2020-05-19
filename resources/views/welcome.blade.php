@extends('layouts.frontend')

@section('content')


<!--================ Banner Section start =================-->
  
<section style="background-image:url('frontend/img/r.jpg')" class="hero-banner text-center">
    <div class="container">
     
      <h1>IngaboResto</h1>
      <p class="text-uppercase">Muraho neza,</p>
      <p class="hero-subtitle">Mu rwego rwo gukomeza gukumira ikwirakwizwa ry'icyorezo cya COVID-19, RURARERA,inc yakoreye abafite amahoteli na za resitora
        urubuga ruborohereza gufata imyirondoro yababagana muburyo bworoshye nkuko byasabwe na RDB.
      </p>
      <a class="button button-outline" href="/register"><i class="fas fa-user-plus"></i> Iyandikishe</a>
    </div>
  </section>
  <!--================ Banner Section end =================-->


  <section class="bg-gray domain-search">
    <div class="container">
      <div class="row no-gutters">
        <div class="col-md-3 col-lg-2 text-center text-md-left mb-3 mb-md-0">
          <h3>Injirira hano</h3>
        </div>


        <form method="POST" action="{{ route('login') }}" class="form-inline">
         
          @csrf

          


          <div class="form-group mx-sm-3 mb-2">
            <label for="inputPassword2" class="sr-only">Imeli</label>
            <input  id="email" type="email" name="email" class="form-control  @error('email') is-invalid @enderror"  placeholder="Imeli" value="{{ old('email') }}" required autocomplete="email" autofocus>
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>Imeli n'umubare banga ntago bigura!!</strong>
            </span>
        @enderror
          
          </div>
      
        
        
          <div class="form-group mx-sm-3 mb-2">
            <label for="inputPassword2" class="sr-only">Umubarebanga</label>
            <input id="password" type="password" name="password"  class="form-control @error('password') is-invalid @enderror" placeholder="Ijambobanga" placeholder="Umubarebanga">
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>Imeli n'umubare banga ntago bigura!!</strong>
                </span>
            @enderror
         
          </div>

         
       
          <button style="background:rgb(71, 51, 255)" type="submit" class="button rounded-0  mb-2">Injira</button>
        </form>


       

      </div>
    </div>
  </section>
  




@endsection
