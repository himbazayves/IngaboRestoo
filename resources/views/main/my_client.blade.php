@extends('layouts.main')

@section('content')



<div  style="margin-top:100px"  class="container">
    <div class="row justify-content-center">

      @php
        {{ $b=$n;}}
      @endphp

@if($b>0)

      

      <div style="background:#FFD133" class="alert col-md-12">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
       Umaze kwandikisha Abakiliya {{$n}} . <a href="/new-client"> kanda hano kugirango wongereho abandi</a>
      </div>

   
        <div class="col-md-12">


          @if(session()->has('message'))
          <div style="background: green" class="alert  alert-dismissible">
             <button type="button" class="close text-danger" data-dismiss="alert">&times;</button>
             <strong class="text-light" > {{ session()->get('message') }}!</strong>    
           </div>
           @endif
 
            <div style="padding-top:10px; padding-bottom:10px; margin-bottom:20px" class="bg-grey">           
            <form class="form-inline" action="{{ route('client_query') }}" method="post">
                @csrf
            <div class="form-group  mb-3">
             
                <select   class="form-control"  onchange="dropdown_district(this.value);" name="province" id="province">
                    <option value="" selected disabled>Intara</option>
                     @foreach($provinces as $p)
                  <option value="{{$p->name}}">{{$p->name}}</option>
                     @endforeach
                </select> 
            </div>
            <div class="form-group  mb-3">
         
                <select onchange="dropdown(this.value);" class="form-control" name="district" value="{{ old('district') }}" autocomplete="district" id="district">
                        
                    <option value="" selected>Akarere</option>
                
                </select>
            </div>


            <div class="form-group  mb-3">
           
                <select  class="form-control" name="sector" value="{{ old('sector') }}"  autocomplete="sector" id="sector">

                    <option value="" selected> Umurenge<option>

                </select>     
              </div>

              <div class="form-group  mb-3">
            
                <input  name="start_date" type="text" placeholder="Guhera tariki" class="form-control datepicker" >
              </div>

              <div class="form-group mb-3">
            
                <input  name="end_date" type="text" placeholder="Kugeza tariki" class="form-control datepicker" >
              </div>

             
            
          
            <button type="submit" class="btn btn-default  mb-3"><i class="fas fa-search"></i>Shaka</button>
          </form>
          <input style="width:100%" type="text" class="form-control" id="myInput" onkeyup="myFunction()" placeholder="Shaka izina..">
        </div>  

        <button id="report" class="btn ntn-defualt"> <i class="far fa-file-alt"></i> Raporo</button>

        <div style="display:none" id="reportform">
        <form  class="form-inline" action="{{ route('report_query') }}" method="post">

          @csrf
          <div class="form-group mb-3">
          <input  name="start_date" type="text" placeholder="Guhera ku itariki" class="form-control datepicker" >
        </div>

        <div class="form-group mb-3">
      
          <input  name="end_date" type="text" placeholder="Kugeza ku itariki" class="form-control datepicker" >
        </div>

       
        <button type="submit" class="btn btn-default  mb-3"><i class="fas fa-search"></i>Shaka</button>

        </form>
      </div>
            <div class="card">

            

              
            
             <!-- <button  type="button" value="Create PDF" id="btPrint" onclick="createPDF()" style="width:100px" class="btn btn-success bt-sm"><i class="fas fa-file-excel"></i> Raporo</button>-->
                <div class="card-header">Abakiliya</div>
           
                <div class="card-body">
                    <div class="table-responsive">
                    

                    <table id="myTable" class="table table-striped ">
                        <thead>
                          <tr>
                            <th scope="col">Amazina</th>
                            <th scope="col">Tel</th>
                            <th scope="col">Intara</th>
                            <th scope="col">Akarere</th>
                            <th scope="col">Umurenge</th>
                            <th scope="col">akagari</th>
                            <th scope="col">Umudugudu</th>
                            <th scope="col">Itariki</th>
                            <th scope="col">Isaha</th>
                            <th scope="col">Igikorwa</th>
                           
                          </tr>
                        </thead>
                        <tbody>

                           
                            @foreach($res as $r)

                            <tr>
                               
                            <td>{{$r->names}}</td>
                            <td>{{$r->tel}}</td>
                            <td>{{$r->province}}</td>
                            <td>{{$r->district}}</td>
                            <td>{{$r->sector}}</td>
                            <td>{{$r->cell}}</td>
                            <td>{{$r->village}}</td>
                            <td>{{$r->arrival_date}}</td>
                            <td>{{$r->arrival_time}}</td>
                            
                            <td>
                                <a href="{{route('edit_client',['id'=>$r->id])}}"> <i class="far fa-trash-alt text-danger"></i> <strong class="text-danger"> Siba </strong></a>
                            
                             <a href="{{route('delete_client',['id'=>$r->id])}}">   <i class="far fa-edit text-success"></i><strong class="text-success"> Hindura</strong></a>
                            </td>
                              </tr>
                             
                                
                            @endforeach
                         
                        </tbody>
                      </table>

                    </div>
                      {!! $res->links() !!}
            </div>
        </div>

        @else


        <div style="background:#FFD133" class="alert col-md-12">
      
          <i class="fas fa-exclamation"></i> Hano niho uzajya urebera abakiriya bawe wanditse, <a href="/new-client"> kanda hano wandikishe umukiliya wambere</a>
        </div>
     

        @endif
    </div>
</div>


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
