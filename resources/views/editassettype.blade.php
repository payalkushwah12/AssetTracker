@extends('master')
@section('content')

<div class="container jumbotron">
<form method="post" action="/home/updateAssetType">
   @csrf()    
   @if(Session::has('errMsg'))
    <div class="alert alert-danger">{{Session::get('errMsg')}}</div>
    @endif
        <div class="form-group">
          <label>Asset Type </label>
          <input type="text" class="form-control" name="name" value="{{ $catdata->name}}"/>
          @if($errors->has('name'))
          <br><span class="alert alert-danger" role="alert">{{$errors->first('name')}}</span>
          @endif
      </div>
      <div class="form-group">
          <label>Asset Description </label>
          <input type="text" class="form-control" name="description" value="{{ $catdata->description}}"/>
          @if($errors->has('description'))
          <div class="alert alert-danger">{{$errors->first('description')}}</div>
          @endif
      </div>
      <input type="hidden" value="{{$catdata->id}}" name="id"/>
      <input type="submit" value="Submit" class="btn btn-success"/>
  </form>
</div>
@endsection