@extends('master')
@section('content')
<div class="jumbotron container">
  <h1 class="text-center mt-3 mb-3"> Assets </h1>
  <table class="table table-bordered table-hover">
  <thead class="thead-dark">
      <tr>
          <th scope="col">S.no</th>
          <th scope="col">Asset Name</th>
          <th scope="col">Asset code </th>
          <th scope="col">Asset type </th>
          <th scope="col">Asset Active Status</th>
          <th scope="col"> Images</th>
          <th scope="col"> Actions</th>
      </tr>
  </thead>
      @php 
       $sn=1;
      @endphp
      @foreach($catdata as $cat)
        <tr>
            <td>{{$sn}}</td>
            <td>{{$cat->a_name}}</td>
            <td>{{$cat->a_code}}</td>
            <td>{{$cat->assettype_id}}</td>
            @if($cat->is_active==1)
              <td class="text-success">Active</td>
            @else
              <td class="text-danger">Inactive</td>
            @endif
            <td><a href="/home/displayAssetImages/{{$cat->id}}" class="btn btn-success">Show images</a></td>
            <td><a href="/home/editAsset/{{$cat->id}}" class="btn btn-primary">Edit</a>&nbsp;
                <a href="/home/deleteAsset/{{$cat->id}}" cid="{{$cat->id}}" class="btn btn-danger" onclick="return confirm('Are you sure to delete?')">Delete</a></td>
        </tr>
      @php 
       $sn++;
      @endphp
      @endforeach
  </table>
</div>
@endsection 