@extends('layouts.main')

@section('content')



<div style="margin-top:100px" class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
         @if(session()->has('message'))
         <div style="background: green" class="alert  alert-dismissible">
            <button type="button" class="close text-danger" data-dismiss="alert">&times;</button>
            <strong class="text-light" > {{ session()->get('message') }}!</strong>    
          </div>

@endif

<div class="alert alert-success"> <center> Umkiliya mushya </center> </div>

            <div class="card">
              
                
                <div class="card-body">
                    <form method="POST" action="{{ route('new_client_handle') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Amazina y'umukiliya</label>

                            <div class="col-md-6">
                                <input id="names" type="text" class="form-control @error('names') is-invalid @enderror" name="names" value="{{ old('names') }}" autocomplete="names" autofocus>

                                @error('names')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>Amazina y'umukiliya ni ngombwa!!</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Intara atuyemo</label>

                            <div class="col-md-6">
                             

                               <select onchange="dropdown_district(this.value);" id="province" type="text" class="form-control @error('province') is-invalid @enderror" name="province" value="{{ old('province') }}" autocomplete="province" autofocus>
                                <option value="" selected disabled>Hitamo intara</option>
                                @foreach($provinces as $p)
                                <option value="{{$p->name}}">{{$p->name}}</option>
                                   @endforeach
                                  
                                </select>

                               </select>
                               
                               
                                @error('province')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>Intara ni ngombwa!!</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>




                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Akarere atuyemo</label>

                            <div class="col-md-6">
                              
                                <select onchange="dropdown(this.value);" class="form-control @error('district') is-invalid @enderror" name="district" value="{{ old('district') }}" autocomplete="district" id="district">
                                
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
                            <label for="password" class="col-md-4 col-form-label text-md-right">Umurenge atuyemo</label>

                            <div class="col-md-6">
                               

                               <select onchange="cell_dropdown(this.value);" class="form-control @error('sector') is-invalid @enderror" name="sector" value="{{ old('sector') }}"  autocomplete="sector" id="sector">
                            
                                <option value=""selected disabled>Hitamo umurenge</option>


                            </select>
                               
                               
                               
                                @error('sector')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>Umurenge ni ngombwa!!</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>



                        <div class="form-group row">
                            <label for="cell" class="col-md-4 col-form-label text-md-right">Akagari atuyemo</label>

                            <div class="col-md-6">
                                

                            <select  id="cell"  class="form-control @error('cell') is-invalid @enderror" name="cell" value="{{ old('cell') }}" autocomplete="cell">
                            
                            <option value="" selected disabled >Hitamo akagari</option>


                            @foreach($cells as $c)

                            <option value="{{$c->name}}">{{$c->name}}</option>
                                
                            @endforeach



                            </select>

                                @error('cell')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="cell" class="col-md-4 col-form-label text-md-right">Umudugudu atuyemo</label>

                            <div class="col-md-6">
                              

                           
                            
                            

                          

                        <input id="village" class="form-control @error('village') is-invalid @enderror" name="village" value="{{ old('village') }}"  autocomplete="village">
                        
                     


                                @error('village')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="cell" class="col-md-4 col-form-label text-md-right">Itariki yaziyeho</label>

                            <div class="col-md-6">
                                <input id="arrival_date" type="date" class="form-control @error('arrival_date') is-invalid @enderror" name="arrival_date" value="{{ old('arrival_date') }}"  autocomplete="village">
                           
                                @error('arrival_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>Itariki ni ngombwa</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>



                        
                        <div class="form-group row">
                            <label for="cell" class="col-md-4 col-form-label text-md-right">Igihe yaziyeho</label>

                            <div class="col-md-6">
                                <input id="arrival_date" type="time" class="form-control @error('arrival_time') is-invalid @enderror" name="arrival_time" value="{{ old('arrival_time') }}"  autocomplete="village">
                             
                                  
                       
                                @error('arrival_time')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>igihe ni ngombwa!!</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="cell" class="col-md-4 col-form-label text-md-right">Telephone ye</label>

                            <div class="col-md-6">
                                <input id="tel" type="text" class="form-control @error('tel') is-invalid @enderror" name="tel" value="{{ old('tel') }}"  autocomplete="tel">
                             
                                  
                                @error('tel')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>Telephone ni ngombwa!!</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="cell" class="col-md-4 col-form-label text-md-right">Restora</label>

                            <div class="col-md-6">
                                <select id="restaurent" type="text" class="form-control @error('restaurent') is-invalid @enderror" name="restaurent" value="{{ old('restaurent') }}" readonly  autocomplete="restaurent">
                                
                                @foreach($res as $r)

                                <option value="{{$r->id}}">{{$r->name}}</option>
                                    
                                @endforeach
                                
                                </select>
                                @error('arrival_time')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>Restora ni ngombwa!!</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                       

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button style="background:rgb(71, 51, 255)" type="submit" class="button rounded-0 ">Bika</button>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
    $(function () {
        $('#arrival_date').datetimepicker({
            format: 'LT'
        });
    });
</script>
@endsection



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

