@extends('layouts.app')

@section('title', '| Edit User')

@section('content')

<style>
        table, th, td {
          border: 1px solid black;
        }table{width: 70%;}
        .evans{
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: -20px;
        }.hello{
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 150px;
        }
        </style>
</head>

<body>
    <div class="hello">
    <h1><b><u>BOOKING DETAILS</u><b></h1>

    </div>
<div class="evans">
  <table class="table table-bordered">
      
    <tr>
        <td><b><u>Check in dates</u></b></td>
        <td><b><u>Check out dates</u></b></td>
        <td><b><u>phone</u></b></td>
        <td><b><u>Age</u></b></td>
        <td><b><u>Gender</u></b></td>
        <td><b><u>Duration in days</u></b></td>
        <td><b><u>charges in kenya sh</u></b></td>
    </tr>   

        <tr>
                <td >{{ $booking->check_in }}</td>
                <td>{{ $booking->check_out}}</td>
                <td>{{$booking->phone }}</td>
                <td>{{$booking->age}}</td>
                <td>{{$booking->gender }}</td>
                <td>{{$booking->Duration }}</td>
                <td>{{$booking->pay }}</td>
        
         </tr>
        </table>
    </div>
<div class="hello">
<a href="{{ URL::to('/bookings') }}" class="btn btn-success pull-right">back</a> 
</div>
     


@endsection