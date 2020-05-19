@extends('layouts.main')

@section('content')


@if(session()->has('message'))
<div class="alert">
    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
    @if(session()->has('message'))
    <div class="alert">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
        {{ session()->get('message') }} .
      </div>
    @endif
  </div>
@endif
<div style="margin-top:100px" class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div style="background:white" class="card">
                <div style="background:#40BAD5"  class="card-header">Restora shyashya</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('new_restaurent_handle') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Izina rya restora</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>Izina ni ngombwa!!</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Intara</label>

                            <div class="col-md-6">
                                <input id="province" type="text" class="form-control @error('province') is-invalid @enderror" name="province" value="{{ old('province') }}" autocomplete="province" autofocus>

                                @error('province')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>Intara ni ngombwa!!</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>




                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Akarere</label>

                            <div class="col-md-6">
                                <input id="district" type="text" class="form-control @error('district') is-invalid @enderror" name="district" value="{{ old('district') }}" autocomplete="district">

                                @error('district')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>Akarere ni ngombwa!!</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Umurenge</label>

                            <div class="col-md-6">
                                <input id="sector" type="text" class="form-control @error('sector') is-invalid @enderror" name="sector" value="{{ old('sector') }}"  autocomplete="sector">

                                @error('sector')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>Umurenge ni ngombwa!!</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>



                        <div class="form-group row">
                            <label for="cell" class="col-md-4 col-form-label text-md-right">Akagari</label>

                            <div class="col-md-6">
                                <input id="cell" type="text" class="form-control @error('cell') is-invalid @enderror" name="cell"value="{{ old('cell') }}" autocomplete="cell">

                                @error('cell')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>Akagari ni ngombwa!!</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="cell" class="col-md-4 col-form-label text-md-right">Umudugudu</label>

                            <div class="col-md-6">
                                <input id="village" type="text" class="form-control @error('village') is-invalid @enderror" name="village" value="{{ old('village') }}"  autocomplete="village">

                                @error('village')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>Umudugudu ni ngombwa!!</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" style="background:#FCBF1E" class="btn btn-primary">
                                    Bika
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
