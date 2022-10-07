<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
    <title>Document</title>
</head>
<body>


@if($message = Session::get('success'))
  <div class="alert alert-success" style="width:23%;margin-left:1050px;">
  <h6 style="text-align:center;">{{ $message}}</h6>
  </div>
  @endif
  
  <div class="container" style="padding-top: 5%;">
    <div class="card-body col-md-12">

<div class="row">
 <form action="{{ route('store') }}" method="POST" id="form">
 @csrf 
      <div class="col-md-12">

      <div class="form-group">
    <label for="formGroup">Name</label>
    <input type="text" class="form-control" name="name" placeholder="Name">
  </div>
  <span class="text-danger">
    @error('name')
        {{ $message }}
    @enderror
</span>
  <div class="form-group">
    <label for="formGroup">Email</label>
    <input type="text" class="form-control" name="email" placeholder="Email">
  </div>
  <span class="text-danger">
    @error('email')
        {{ $message }}
    @enderror
</span>
  <div class="form-group">
    <label for="formGroup">Mobile Number</label>
    <input type="number" class="form-control" name="mobile_no" placeholder="Mobile Number">
  </div>
  <span class="text-danger">
    @error('mobile_no')
        {{ $message }}
    @enderror
</span>
  <div class="form-group">
    <label for="formGroup">DOB</label>
    <input type="text" class="date form-control" name="dob" placeholder="DOB">
  </div>
  <span class="text-danger">
    @error('dob')
        {{ $message }}
    @enderror
</span>
  <div class="form-group">
    <label for="formGroup">Address</label>
    <textarea type="text" class="form-control" name="address" placeholder="Address"></textarea>
  </div>
  <span class="text-danger">
    @error('address')
        {{ $message }}
    @enderror
</span>
    
       <br>
      <div class="left">
      <button type="submit" class="btn btn-primary">Submit</button>
      </div>
      </div>

      </form>
      </div>

      <script type="text/javascript">
        $('.date').datepicker({  
           format: 'dd-mm-yyyy'
         });  
    </script> 

<script>
    $(document).ready(function () {
        $('#form').validate({ 
            rules: {
                name: {
                    required: true
                },
                email: {
                    required: true,
                    email: true
                },
                number: {
                    required: true,
                    digits: true
                    
                },
            },
            messages: {

                email: {
                  required: "Please enter valid email",
                },
                mobile_no: {
                  required: "Please enter number only",
                },
                address: {
                  required: "Please enter address",
                },
          
        });
    });
</script>

</body>
</html>