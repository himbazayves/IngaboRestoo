










@extends('layouts.frontend')

@section('content')





  <section style="margin-top: 30px" class="bg-gray domain-search">
    <div class="container">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
            <div class="alert alert-success"> <center> Kwiyandikisha </center></div>

                    <div class="card">
                        
        
                        <div class="card-body">
                            <form method="POST" action="{{ route('register') }}">
                                @csrf



                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">Izina rya resitora</label>
        
                                    <div class="col-md-6">
                                        <input id="resto_name" type="text" class="form-control @error('name') is-invalid @enderror" name="resto_name" value="{{ old('resto_name') }}" autocomplete="name" autofocus>
        
                                        @error('resto_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>Izina ni ngombwa!!</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
        
        
                                
                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">Intara irimo</label>
        
                                    <div class="col-md-6">
                                      <!--  <input id="province" type="text" class="form-control @error('province') is-invalid @enderror" name="province" value="{{ old('province') }}" autocomplete="province" autofocus> -->
                                    
                                        <select onchange="dropdown_district(this.value);" id="province" class="form-control @error('province') is-invalid @enderror" name="province" value="{{ old('province') }}" autocomplete="province" autofocus>
                                        <option value="" selected disabled>Hitamo intara</option>
                                        @foreach($province as $p)
                                    <option value="{{$p->name}}">{{$p->name}}</option>
                                       
                                            
                                        @endforeach

                                    </select>

                                        @error('province')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>Intara ni ngombwa!!</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
        
        
        
        
                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">Akarere irimo</label>
        
                                    <div class="col-md-6">
                                    
        

                                    <select id="district" onchange="dropdown(this.value);" class="form-control @error('district') is-invalid @enderror" name="district" value="{{ old('district') }}" autocomplete="district">
                                    
                                        <option value="" selected disabled>Hitamo akarere</option>
                                    
                                    </select>

                                        @error('district')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>Akarere ni ngombwa!!</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
        
                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">Umurenge irimo</label>
        
                                    <div class="col-md-6">
                                       
        
                                        <select id="sector" onchange="cell_dropdown(this.value);" type="text" class="form-control @error('sector') is-invalid @enderror" name="sector" value="{{ old('sector') }}"  autocomplete="sector" name="" id="">

                                            <option value="" selected disabled>Hitamo umurenge</option>




                                        </select>

                                        @error('sector')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>Umurenge ni ngombwa!!</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
        
        
        
                                <div class="form-group row">
                                    <label for="cell" class="col-md-4 col-form-label text-md-right">Akagali irimo</label>
        
                                    <div class="col-md-6">
                                      
        
                                    <select id="cell" class="form-control @error('cell') is-invalid @enderror" name="cell"value="{{ old('cell') }}" autocomplete="cell">

                                    <option value="" selected disabled>Hitamo akagali</option>

                                    @foreach($cell as $c)

                                    <option value="{{$c->name}}">{{$c->name}}</option>
                                        
                                    @endforeach

                                    </select>

                                        @error('cell')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>Akagari ni ngombwa!!</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
        
                       
        
        
                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">Amazina y'anyirayo</label>
        
                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
        
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>Amazina ni ngombwa!!</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
        
        
                                
                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">Telefone ye</label>
        
                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control @error('tel') is-invalid @enderror" name="tel" value="{{ old('tel') }}" required autocomplete="name" autofocus>
        
                                        @error('tel')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>Telefone ni ngombwa!!</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
        
        
        
        
                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">Imeli ye</label>
        
                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
        
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>Imeli ni ngombwa!!</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
        
                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">Umubarebanga</label>
        
                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
        
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>Umubarebanga ni ngomwa kandi ugomba kuba uri hejuri yinyuguti 6!!</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
        
                                <div class="form-group row">
                                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Subiramo umubarebanga</label>
        
                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div>
        
        
                                <div class="form-group row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button style="background:rgb(71, 51, 255)" type="submit" class="button rounded-0">Iyandikishe</button>
        
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </section>
  <script >
    function dropdown_district(msg){
        var province=msg;
  
        $.ajax({
       url: 'getdistricts/'+province,
       type: 'get',
       dataType: 'json',
       success: function(response){
            $("#district").empty(); 
  
         var len = 0;
         if(response['data'] != null){
            
           len = response['data'].length;
         
         }
         if(len > 0){
           // Read data and create <option >
          
        
           for(var i=0; i<len; i++){
  
             var id = response['data'][i].id;
             var name = response['data'][i].name;
  
             var option = "<option value='"+name+"'>"+name+"</option>"; 
  
             $("#district").append(option); 
           }
         }
  
       }
    });
    }
  </script>
          


          <script >
            function dropdown(msg){
                var district=msg;

                $.ajax({
               url: 'getsectors/'+district,
               type: 'get',
               dataType: 'json',
               success: function(response){
                    $("#sector").empty(); 
        
                 var len = 0;
                 if(response['data'] != null){
                    
                   len = response['data'].length;
                 
                 }
                 if(len > 0){
                   // Read data and create <option >
                  
                
                   for(var i=0; i<len; i++){
        
                     var id = response['data'][i].id;
                     var name = response['data'][i].name;
        
                     var option = "<option value='"+name+"'>"+name+"</option>"; 
        
                     $("#sector").append(option); 
                   }
                 }
        
               }
            });
            }
       </script>




<script >
    function cell_dropdown(msg){
        var sector=msg;

        $.ajax({
       url: 'getcells/'+sector,
       type: 'get',
       dataType: 'json',
       success: function(response){
            $("#cell").empty(); 

         var len = 0;
         if(response['data'] != null){
            
           len = response['data'].length;
         
         }
         if(len > 0){
           // Read data and create <option >
          
        
           for(var i=0; i<len; i++){

             var id = response['data'][i].id;
             var name = response['data'][i].name;

             var option = "<option value='"+name+"'>"+name+"</option>"; 

             $("#cell").append(option); 
           }
         }

       }
    });
    }
</script>


@endsection
