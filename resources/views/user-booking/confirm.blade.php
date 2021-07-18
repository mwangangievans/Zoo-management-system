@extends('layouts.app')

@section('title', '| booking')

@section('content')
<div class="col-lg-10 col-lg-offset-1">
  <h3 class="info">recent bookings </h3>
<div class="pull-right"> <a href="https://www.twilio.com/console/phone-numbers/verified"><button  class="btn btn-primary">Verify your phone number</button></a></div>
  
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary non_printable" data-toggle="modal" data-target="#BookVisit">
  <h4 class="non_printable">Book a visit</h4>
</button>

<!-- Modal -->
<div class="modal fade non_printable" id="BookVisit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Book a Visit to our Zoo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
<div class="ticket">
    <form method="POST" action="{{ route('bookings.store') }}" class="formless" >   

             <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div>
                    <div class="form-group">
                            <label  for="Name">
                                Check in date
                            </label>
                            <input  type="date" name="check_in" id="datepicker-sc" class="form-control" placeholder="enter check in dates">
                    </div>
                     <div class="form-group">
                            <label  for="Name">
                         Check out date                            </label>
                            <input  type="date" name="check_out" id="datepicker-sc" class="form-control" placeholder="enter chech out dates">
                    </div>
                     <div class="form-group">
                            <label  for="Name">
                                Phone 
                            </label>
                            <input  type="text" name="phone" id="phone" class="form-control" placeholder="enter phone">
                    </div>
                     <div class="form-group">
                            <label  for="Name">
                                Age 
                            </label>
                            <input  type="text" name="age" id="age" class="form-control" placeholder="enter age">
                    </div>
                <div class="form-group">
                    <div class="md:w-1/3">
                        <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                            Gender
                        </label>
                    </div>
                    <div class="md:w-2/3">
                        <div class="flex flex-row items-center">
                            <label class="block text-gray-500 font-bold">
                                <input name="gender" class="mr-2 leading-tight" type="radio" value="male">
                                <span class="text-sm">Male</span>
                            </label>
                            <label class="ml-4 block text-gray-500 font-bold">
                                <input name="gender" class="mr-2 leading-tight" type="radio" value="female">
                                <span class="text-sm">Female</span>
                            </label>
                            <label class="ml-4 block text-gray-500 font-bold">
                                <input name="gender" class="mr-2 leading-tight" type="radio" value="other">
                                <span class="text-sm">Other</span>
                            </label>
                        </div>
                    
                    </div>
                </div>
                <div class="form-group">
                    <div class="md:w-1/3">
                        <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                            Nationality
                        </label>
                    </div>
                    <div class="md:w-2/3">
                        <div class="flex flex-row items-center">
                    
                            <label class="block text-gray-500 font-bold">
                                <input name="nationality" class="mr-2 leading-tight" type="radio" value="foreigner">
                                <span class="text-sm">Foreigner</span>
                            </label>       <span class="text-sm">1000/=</span> <br>
                            <label class="ml-4 block text-gray-500 font-bold">
                                <input name="nationality" class="mr-2 leading-tight" type="radio" value="local">
                                <span class="text-sm">Local</span>
                            </label> <span class="text-sm">600/=</span>
                
                        </div>
                    
                    </div>
                </div>
            <!-- <button class="btn btn-primary non_printable">Save</button> -->
                    </div>
                    <html>
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

/* Set a style for all buttons */
button {
  background-color: #04AA6D;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

button:hover {
  opacity:1;
}

/* Float cancel and delete buttons and add an equal width */
.cancelbtn, .deletebtn {
  float: left;
  width: 50%;
}

/* Add a color to the cancel button */
.cancelbtn {
  background-color: #ccc;
  color: black;
}

/* Add a color to the delete button */
.deletebtn {
  background-color: #f44336;
}

/* Add padding and center-align text to the container */
.container {
  padding: 16px;
  text-align: center;
}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: #474e5d;
  padding-top: 50px;
}

/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
  border: 1px solid #888;
  width: 80%; /* Could be more or less, depending on screen size */
}

/* Style the horizontal ruler */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}
 
/* The Modal Close Button (x) */
.close {
  position: absolute;
  right: 35px;
  top: 15px;
  font-size: 40px;
  font-weight: bold;
  color: #f1f1f1;
}

.close:hover,
.close:focus {
  color: #f44336;
  cursor: pointer;
}

/* Clear floats */
.clearfix::after {
  content: "";
  clear: both;
  display: table;
}

/* Change styles for cancel button and delete button on extra small screens */
@media screen and (max-width: 300px) {
  .cancelbtn, .deletebtn {
     width: 100%;
  }
}
</style>
<body>

<h2>Delete Modal</h2>

<button onclick="document.getElementById('id01').style.display='block'">Open Modal</button>

<div id="id01" class="modal">
  <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">×</span>
  <form class="modal-content" action="/action_page.php">
    <div class="container">
      <h1>Delete Account</h1>
      <p>Are you sure you want to delete your account?</p>
    
      <div class="clearfix">
        <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
        <button type="button" onclick="document.getElementById('id01').style.display='none'" class="deletebtn">Delete</button>
      </div>
    </div>
  </form>
</div>

<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>

</body>
</html>

    </form>
            </div>
      </div>
    </div>
  </div>
</div>

        <table id="example" class="table table-bordered table-striped ">
            <thead>
                <tr class="wildlifeme">
                    <th>User Name</th>
                    <th >Check in</th>
                    <th >Check out</th>
                    <th >phone</th>
                    <th >Age</th>
                    <th >Gender</th>
                    <th >Nationality</th>
                     <th >Duration in days</th>
                     <th >Charges in ksh</th>
                   <th class="non_printable">Action</th>
                </tr>
            </thead>
            <tbody>
                @if (count($user->booking) > 0)
                    @foreach ($user->booking as $booking)
                        <tr>
                            <td><a href="/bookings/{{$booking->id}}">{{$booking->userBooking->name}}</a></td>
                            <td >{{ $booking->check_in }}</td>
                            <td>{{ $booking->check_out}}</td>
                            <td>{{$booking->phone }}</td>
                            <td>{{$booking->age}}</td>
                            <td>{{$booking->gender }}</td>
                            <td>{{$booking->nationality }}</td>
                            <td>{{$booking->Duration }}</td>
                             <td>{{$booking->pay }}</td>

                    <td class="non_printable" id="action">
                        
                    <a href="{{ route('bookings.edit',$booking->id) }}"> <button type="button" class="btn btn-primary pull-right non_printable">Edit</button></a>
                 
                   
               {!! Form::open(['method' => 'DELETE', 'route' => ['bookings.destroy', $booking->id] ]) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}</td> 
                        </tr>
                    @endforeach
                @else
                @endif
            </tbody>

        </table>
    </div>
     
</div>
       <div class="pull-right"> <button onclick="printme()" class="btn btn-primary">Print</button></div>

<script>
    function printme(){
        window.print();
    }
</script>

@endsection