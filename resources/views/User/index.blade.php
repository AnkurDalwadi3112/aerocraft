<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<style>
    #sailorTableArea{
    max-height: 300px;
    overflow-x: auto;
    overflow-y: auto;
}
#sailorTable{
    white-space: normal;
}
tbody {
    display:block;
    height:200px;
    overflow:auto;
}
thead, tbody tr {
    display:table;
    width:100%;
    table-layout:fixed;
}

    </style>
<div class="table-responsive" id="sailorTableArea">
<a href="{{route('user.create') }}" class="btn btn-primary">Add New</a>
    <table id="sailorTable" class="table table-striped table-bordered" width="100%">
 
        <thead>
            <tr>
                <th>First name</th>
                <th>Last name</th>
                <th>Email</th>
                <th>Number</th>
                <th>Address</th>
                <th>Gender</th>
                <th>Hobby</th>
                <th>Date</th>
                <th>Photo</th>
                <th>Action</th>
            </tr>
        </thead>
       <tbody>
@foreach($users as $data)
<?php
$img='';
if(!$data->Photo){
    $img =public_path('Admin/'.$data->Photo);
}
?>
<tr>
    <td>{{ $data->Fname}}</td>
    <td>{{ $data->Lname}}</td>
    <td>{{ $data->email}}</td>
    <td>{{ $data->Fname}}</td>
    <td>{{ $data->Address}}</td>
    <td>{{ $data->Gender}}</td>
    <td>{{$data->Hobby}}</td>
    <td>{{ $data->created_date}}</td>
    <td><img src="{{URL::asset('Admin/'.$data->Photo)}}" style="    height: 51px;
    width: 51px;"></td>
    <td>
        <a href="{{route('user.edit',$data->id) }}">Edit</a>
        <form action="{{ route('user.destroy', $data->id) }}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
        </form>

</form>
</td>
</tr>
@endforeach
        </tbody>
    </table>
    </div>
  