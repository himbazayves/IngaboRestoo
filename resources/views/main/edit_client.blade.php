@extends('layouts.main')

@section('content')


<div style="margin-top:100px" class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            
@if(session()->has('message'))
<div class="alert">
    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
    {{ session()->get('message') }}
  </div>
@endif


<div class="alert alert-success"> <center> Guhindura umukiliya </center> </div>
            <div class="card">
               

                <div class="card-body">
                    <form method="POST" action="{{ route('update_client') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Amazina y'umukiliya</label>

                            <div class="col-md-6">
                                <input id="names" value="{{$client->names}}" type="text" class="form-control @error('names') is-invalid @enderror" name="names" value="{{ old('names') }}" autocomplete="names" autofocus>

                                @error('names')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Intara atuyemo</label>

                            <div class="col-md-6">
                                <input id="province" value="{{$client->province}}"  type="text" class="form-control @error('province') is-invalid @enderror" name="province" value="{{ old('province') }}" autocomplete="province" autofocus>

                                @error('province')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>




                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Akarere atuyemo</label>

                            <div class="col-md-6">
                                <input id="district" value="{{$client->district}}"  type="text" class="form-control @error('district') is-invalid @enderror" name="district" value="{{ old('district') }}" autocomplete="district">

                                @error('district')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Umurenge atuyemo</label>

                            <div class="col-md-6">
                                <input id="sector" type="text" value="{{$client->sector}}"  class="form-control @error('sector') is-invalid @enderror" name="sector" value="{{ old('sector') }}"  autocomplete="sector">

                                @error('sector')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>



                        <div class="form-group row">
                            <label for="cell" class="col-md-4 col-form-label text-md-right">Akagari atuyemo</label>

                            <div class="col-md-6">
                                <input id="cell" type="text" value="{{$client->cell}}"  class="form-control @error('cell') is-invalid @enderror" name="cell"value="{{ old('cell') }}" autocomplete="cell">

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
                                <input id="village" value="{{$client->village}}"  type="text" class="form-control @error('village') is-invalid @enderror" name="village" value="{{ old('village') }}"  autocomplete="village">

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
                            <input value="{{$client->arrival_date}}" id="arrival_date" type="date" class="form-control @error('arrival_date') is-invalid @enderror" name="arrival_date" value="{{ old('arrival_date') }}"  autocomplete="village">
                               
                                @error('arrival_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <input value="{{$client->id}}" id="id" type="hidden" class="form-control"  name="id" >
                        
                        <div class="form-group row">
                            <label for="cell" class="col-md-4 col-form-label text-md-right">Igihe yaziyeho</label>

                            <div class="col-md-6">
                                <input id="arrival_date" value="{{$client->arrival_time}}" type="time" class="form-control @error('arrival_time') is-invalid @enderror" name="arrival_time" value="{{ old('arrival_time') }}"  autocomplete="village">
                             
                                 
                       
                                @error('arrival_time')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="cell" class="col-md-4 col-form-label text-md-right">Telephone ye</label>

                            <div class="col-md-6">
                                <input id="tel" value="{{$client->tel}}" type="text" class="form-control @error('tel') is-invalid @enderror" name="tel" value="{{ old('tel') }}"  autocomplete="tel">
                             
                                  
                                @error('tel')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="cell" class="col-md-4 col-form-label text-md-right">Restora</label>

                            <div class="col-md-6">
                                <select id="restaurent" type="text" class="form-control @error('restaurent') is-invalid @enderror" name="restaurent" value="{{ old('restaurent') }}"  autocomplete="restaurent">
                                
                                @foreach($res as $r)

                                <option value="{{$r->id}}">{{$r->name}}</option>
                                    
                                @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button style="background:rgb(71, 51, 255)" type="submit" class="button rounded-0 ">Hindura</button>
                            </div>
                        </div>

                        
                      

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
