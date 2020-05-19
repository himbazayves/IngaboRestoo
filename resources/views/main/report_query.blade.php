@extends('layouts.main')

@section('content')
 


<div style="padding-top:100px;backgroud:green"  class="alert alert-success alert-dismissible">
    <button type="button" class="close text-danger" data-dismiss="alert">&times;</button>
 <strong class="text-light" >  Raporo yawe ifite abakiliya {{$number}}</strong>.   <a href="/my-client"> kanda hano ugaruke kuri lisite yabakiliya</a>  
  </div>

  <p>
 

        <button id="btPrint" onclick="createPDF()" class="btn btn-default"><i class="fas fa-file-download"></i>Kuraho</button>
</p>


    <div style="padding-top:20px" id="tab">
<div class="table-responsive">

        <table class="table table-bordered"> 
            <tr>
                <th>Izina </th>
                 <th>Akarere</th>
              <th>Umurenge</th>
              <th>Akagari</th>

              <th>Tel</th>
              <th>Itariki yaziye</th>
              <th>Igihe yaziye</th>
           
            </tr>  
              
            @foreach($res as $r)
            <tr>
            <th>{{$r->names}}</th>
            <th>{{$r->district}}</th>
            <th>{{$r->sector}}</th>
            <th>{{$r->cell}}</th>
            <th>{{$r->tel}}</th>
            <th>{{$r->arrival_date}}</th>
            <th>{{$r->arrival_time}}</th>
            </tr>
          @endforeach

          
        </table>
    </div>
</div>


<script>
    function createPDF() {
        var sTable = document.getElementById('tab').innerHTML;

        var style = "<style>";
        style = style + "table {width: 100%;font: 17px Calibri;}";
        style = style + "table, th, td {border: solid 1px #DDD; border-collapse: collapse;";
        style = style + "padding: 2px 3px;text-align: center;}";
        style = style + "</style>";

        // CREATE A WINDOW OBJECT.
        var win = window.open('', '', 'height=700,width=700');

        win.document.write('<html><head>');
        win.document.write('<title>Raporo </title>');   // <title> FOR PDF HEADER.
        win.document.write(style);          // ADD STYLE INSIDE THE HEAD TAG.
        win.document.write('</head>');
        win.document.write('<body>');
        win.document.write(sTable);         // THE TABLE CONTENTS INSIDE THE BODY TAG.
        win.document.write('</body></html>');

        win.document.close(); 	// CLOSE THE CURRENT WINDOW.

        win.print();    // PRINT THE CONTENTS.
    }
</script>
@endsection
