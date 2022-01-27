@extends('master')
@section('content')

<div class="container jumbotron">
<form method="post" action="/home/updateAsset" enctype="multipart/form-data">
   @csrf()    
   @if(Session::has('errMsg'))
    <div class="alert alert-danger">{{Session::get('errMsg')}}</div>
    @endif
    <div class="form-group">
          <label>Asset Name </label>
          <input type="text" class="form-control" name="a_name" value="{{ $catdata->a_name}}"/>
          @if($errors->has('a_name'))
          <br><span class="alert alert-danger" role="alert">{{$errors->first('a_name')}}</span>
          @endif
      </div>
      <div class="form-group">
          <label>Asset Code </label>
          <input type="text" class="form-control" name="code" value="{{ $catdata->a_code}}"/>
          @if($errors->has('code'))
          <div class="alert alert-danger">{{$errors->first('code')}}</div>
          @endif
      </div>
      <div class="form-group">
          <label>Asset Type</label>
          <select class="form-control" name="type">
            <option value=""> Select </option>
            @foreach($data as $catname)
              <option value="{{$catname->id}}">{{$catname->name}}</option>
            @endforeach
            </select>
            @if($errors->has('type')) <div class="alert alert-danger">{{$errors->first('type')}}</div>
          @endif
        </div>
        <div class="form-group">
          <label>Asset Image </label>
          <input type="file" class="form-contol" name="images[]" multiple/>
          @if($errors->has('images'))<div class="alert alert-danger">{{$errors->first('images')}}</div>
          @endif
        </div>
        <div class="form-group">
            <label>Is Active </label><br>
            &nbsp;<input type="radio" name="radio" id="yes" value="1" checked>
            <label for="yes">Yes</label>&nbsp;&nbsp;
            <input type="radio" name="radio" id="no" value="0">
            <label for="no">No</label>
        </div>
        <input type="hidden" value="{{$catdata->id}}" name="id"/>
      <input type="submit" value="Submit" class="btn btn-success"/>
  </form>
  
</div>
@endsection