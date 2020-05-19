@extends('layouts.manager')

@section('content')

            <div class="row">
                <!--  page header -->
               <div class="col-lg-12">
                   <h1 class="page-header">All registered  Restuarents</h1>
               </div>
                <!-- end  page header -->
           </div>
           <div class="row">
               <div class="col-lg-12">
               

                   <div class="table-responsive">   
                       
                   
                   <div class="panel panel-default">
                       <div class="panel-heading">
                            Restuarent
                       </div>
                       <div class="panel-body">
                           <div class="table-responsive">

                         
                               <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                   <thead>
                                       <tr>
                                           <th>Rest Names</th>
                                           <th>Province</th>
                                           <th>District</th>
                                           <th>Sector</th>
                                           <th>Cell</th>
                                           <th>Owner</th>
                                           <th>Contact</th>
                                           <th>Create date</th>
                                       </tr>
                                   </thead>
                                   <tbody>

                                    @foreach($restaurent as $c)

                                    <tr class="odd gradeX">
                                        <td>{{$c->name}}</td>
                                        <td>{{$c->province}}</td>
                                        <td>{{$c->district}}</td>
                                        <td>{{$c->cell}}</td>
                                        <td>{{$c->sector}}</td>
                                        <td>{{$c->user->name}}</td>
                                        <td>{{$c->user->tel}}</td>
                                        <td>{{$c->created_at}}</td>
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