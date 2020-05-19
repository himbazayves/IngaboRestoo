@extends('layouts.main')

@section('content')
<div style="margin-top:100px" class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if(isset($res))



  <div style="background: green" class="alert  alert-dismissible">
    <button type="button" class="close text-danger" data-dismiss="alert">&times;</button>
    <strong class="text-light" >  Akayunguruzo kawe kazanye abakiliya {{$number}}.</strong>  <a href="/my-client"> kanda hano usubire uri lisite y'abakiliya</a>  
  </div>
@endif
            
            <div class="card">
                <div class="card-header">Abakiliya bose</div>

                <div class="card-body">
                    <div class="table-responsive">
                    <input style="width:100%" type="text" class="form-control" id="myInput" onkeyup="myFunction()" placeholder="Shaka izina..">

                    <table id="myTable" class="table table-striped ">
                        <thead class="thead-dark">
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
                    
            </div>
        </div>
    </div>
</div>



<script>
function myFunction() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
</script>
 



        


@endsection
