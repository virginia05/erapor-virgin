@extends('layouts.layout')
@section('content')
    <div class="m-3 mt-4 mb-4">
        <iframe id="invisible" name="invisible" style="display:none;"></iframe>
        <div class="d-flex align-items-baseline">

           <a href="{{ url("/nilai") }}" class="btn btn-success mr-3"> 
            Kembali
          </a>
        </div>
        <hr>
        <div class="my-4 mx-2">    
          <form class="" method="post" action="{{ url("/edit-catatan/$nis") }}" >
            @csrf
            <input type="hidden" name="nis" value="{{ $nis }}">
            <div class="form-group">
              <label for="exampleFormControlTextarea1">Catatan Semester</label>
              <textarea name="catatan" class="form-control" id="exampleFormControlTextarea1" rows="5">{{$kepribadian ? $kepribadian->catatan : ''}}</textarea>
            </div>
            <button class="btn btn-success" type="submit">Simpan</button>
          </form>
        </div>


        
    </div>
@stop