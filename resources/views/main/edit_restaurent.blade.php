@extends('layouts.main')

@section('content')



    
  

<div style="margin-top:100px" class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
         
            <div class="alert alert-success">Guhindura Restora</div>
            <div style="background:white" class="card">
                

                <div class="card-body">
                    <form method="POST" action="{{ route('update_restaurent') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Izina rya restora</label>

                            <div class="col-md-6">
                            <input id="name" type="text" value="{{$res->name}}" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Intara</label>

                            <div class="col-md-6">
                                <input id="province" value="{{$res->province}}" type="text" class="form-control @error('province') is-invalid @enderror" name="province" value="{{ old('province') }}" autocomplete="province" autofocus>

                                @error('province')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>




                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Akarere</label>

                            <div class="col-md-6">
                                <input id="district" value="{{$res->district}}" type="text" class="form-control @error('district') is-invalid @enderror" name="district" value="{{ old('district') }}" autocomplete="district">

                                @error('district')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Umurenge</label>

                            <div class="col-md-6">
                                <input id="sector" value="{{$res->sector}}" type="text" class="form-control @error('sector') is-invalid @enderror" name="sector" value="{{ old('sector') }}"  autocomplete="sector">

                                @error('sector')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>



                        <div class="form-group row">
                            <label for="cell" class="col-md-4 col-form-label text-md-right">Akagari</label>

                            <div class="col-md-6">
                                <input id="cell" type="text" value="{{$res->cell}}" class="form-control @error('cell') is-invalid @enderror" name="cell"value="{{ old('cell') }}" autocomplete="cell">

                                @error('cell')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="cell" class="col-md-4 col-form-label text-md-right">Umudugudu</label>

                            <div class="col-md-6">
                                <input id="village" value="{{$res->village}}" type="text" class="form-control @error('village') is-invalid @enderror" name="village" value="{{ old('village') }}"  autocomplete="village">

                                @error('village')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                         
                                <button type="submit" class="button rounded-0">Hindura</button>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
