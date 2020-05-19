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
                @if(isset($client))
                <div class="alert">
                    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                 Your search returned  {{$number}} result. <a href="{{route('manager.client')}}"> back to client list</a>
                  </div>
                @endif

                   <div class="table-responsive">   
                       
                   
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



      
    
       @endsection