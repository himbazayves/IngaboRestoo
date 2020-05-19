
@extends('layouts.main')

@section('content')





        <section class="section-padding">
            <div class="container">

                @if(session()->has('message'))
                <div class="alert  col-md-12 alert-success">
                    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                    {{ session()->get('message') }} .
                  </div>
                @endif
              <div class="pb-85px text-center">
                <h2><i class="fas fa-utensils"></i>Resitora yawe</h2>
                <div class="section-style"></div>
              </div>
        

              
        @foreach($res as $r)
              <div class="row justify-content-center">
                <div class="col-sm-6 col-lg-4 mb-4 mb-lg-0">
                  <div class="card text-center card-pricing">
                    <div class="card-pricing__header">
                      <h4>  {{$r->name}} </h4>

                    </div>
                    <ul class="card-pricing__list">
                      <li> Intara: {{$r->province}}</li>
                      <li>Akarere: {{$r->district}}</li>
                      <li>Umurenge: {{$r->sector}} </li>
                      <li>Akagari: {{$r->cell}}</li>
                      <li>Umudugudu: {{$r->village}}</li>
                 
                    </ul>
                    <div class="card-pricing__footer">
                      <a href="{{route('edit_restaurent',['id'=>$r->id])}}" class="button"><i class="far fa-edit "></i>Hindura</a>
                    </div>
                  </div>
                </div>
        
               
        @endforeach
      
              </div>
            </div>
          </section>
          <!--================ Price Table section end =================-->

       

    </div>
</div>
@endsection


