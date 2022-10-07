<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
  
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
    <title>Document</title>
</head>
<body>

<div class="topcorner" style="float:right;padding:8px 16px;">
    <a class="btn btn-primary" href="{{ route('index') }}">Add User</a>
</div>
<div class="pull-right p-2 ">

    <a class="btn btn-success" onclick="alert('Are you really want to logout!')"
        href="{{ url('logout') }}">Logout</a>
</div>

<div class="pull-right p-2 ">

    <a class="btn btn-success" href="{{ url('user_export') }}">Export</a>
</div>
<table id="table_id" class="display">
    <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Mobile Number</th>
            <th>DOB</th>
            <th>Address</th>
        </tr>
    </thead>
    <tbody>
      @foreach($users as $user)
      <tr>
        <td>{{ $user->id }}</td>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->mobile_no }}</td>
        <td>{{ $user->dob }}</td>
        <td>{{ $user->address }}</td>
   </tr>
   @endforeach 
    </tbody>
</table>
</body>
</html>

<script>
    $(document).ready( function () {
        $('#table_id').DataTable()
    } );
    </script>