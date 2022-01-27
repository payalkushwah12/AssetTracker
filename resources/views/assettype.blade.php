@extends('master')

@section('content')
<div class="jumbotron container">
  <h1 class="text-center mt-3 mb-3"> Asset Types </h1>
  <table class="table table-bordered table-hover">
  <thead class="thead-dark">
      <tr>
          <th scope="col">S.no</th>
          <th scope="col">Name</th>
          <th scope="col"> Description </th>
          <th scope="col"> Actions</th>
      </tr>
    </thead>
      @php 
       $sn=1;
      @endphp
      @foreach($catdata as $cat)
        <tr>
            <td>{{$sn}}</td>
            <td>{{$cat->name}}</td>
            <td>{{$cat->description}}</td>
            <td><a href="/home/editAssetType/{{$cat->id}}" class="btn btn-primary">Edit</a>&nbsp;
                <a href="/home/deleteAssetType/{{$cat->id}}" class="btn btn-danger" onclick="return confirm('Are you sure? If you delete this asset type, all assets under this asset type will be deleted too!')">Delete</a></td>
            </tr>
        @php 
       $sn++;
      @endphp
      @endforeach
  </table>
</div>
@endsection 