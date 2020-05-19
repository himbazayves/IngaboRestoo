@extends('layouts.manager')

@section('content')

            <div class="row">
                <!--  page header -->
               <div class="col-lg-12">
                   <h1 class="page-header">All registered  clients</h1>
               </div>
                <!-- end  page header -->
           </div>
           <div class="row">
               <div class="col-lg-12">
                @if(session()->has('message'))
                <div class="alert">
                    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                    {{ session()->get('message') }}
                  </div>
                @endif

                   <div class="table-responsive">   
                       
                    <form class="form-inline" action="{{ route('manager.client_query') }}" method="post">
                        @csrf
                    <div class="form-group">
                     
                        <select   class="form-control"  onchange="dropdown_district(this.value);" name="province" id="province">
                            <option value="" selected disabled>Province</option>
                             @foreach($provinces as $p)
                          <option value="{{$p->name}}">{{$p->name}}</option>
                             @endforeach
                        </select> 
                    </div>
                    <div class="form-group">
                 
                        <select onchange="dropdown(this.value);" class="form-control" name="district" value="{{ old('district') }}" autocomplete="district" id="district">
                                
                            <option value="" selected>District</option>
                        
                        </select>
                    </div>


                    <div class="form-group">
                   
                        <select  class="form-control" name="sector" value="{{ old('sector') }}"  autocomplete="sector" id="sector">

                            <option value="" selected> Sector<option>

                        </select>     
                      </div>

                      <div class="form-group">
                    
                        <input name="start_date" type="text" placeholder="Start date" class="form-control datepicker" >
                      </div>

                      <div class="form-group">
                    
                        <input name="end_date" type="text" placeholder="Start date" class="form-control datepicker" >
                      </div>

                     
                    
                  
                    <button type="submit" class="btn btn-default">Search</button>
                  </form></div>

                   <!-- Advanced Tables -->
                   <div class="panel panel-default">
                       <div class="panel-heading">
                            Clients
                       </div>
                       <div class="panel-body">
                           <div class="table-responsive">

                         
                               <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                   <thead>
                                       <tr>
                                           <th>Names</th>
                                           <th>Province</th>
                                           <th>District</th>
                                           <th>Sector</th>
                                           <th>Restaurent</th>
                                           <th>Date</th>
                                           <th>time</th>
                                       </tr>
                                   </thead>
                                   <tbody>

                                    @foreach($client as $c)

                                    <tr class="odd gradeX">
                                        <td>{{$c->names}}</td>
                                        <td>{{$c->province}}</td>
                                        <td>{{$c->district}}</td>
                                        <td>{{$c->sector}}</td>
                                        <td>{{$c->restaurent->name}}</td>
                                        <td>{{$c->arrival_date}}</td>
                                        <td>{{$c->arrival_time}}</td>
                                        </tr>
                                        
                                    @endforeach
                                      
                                     
                                   </tbody>
                               </table>
                           </div>
                           
                       </div>
                   </div>
                   <!--End Advanced Tables -->
               </div>
           </div>
        
                   <!--  end  Context Classes  -->
               </div>
           </div>
       </div>
       <!-- end page-wrapper -->



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