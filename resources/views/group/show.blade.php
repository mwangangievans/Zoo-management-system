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
        <td><b><u>check-in dates</u></b></td>
        <td><b><u>check-out dates</u></b></td>
        <td><b><u>Contact Number</u></b></td>
        <td><b><u>no of participants</u></b></td>
        <td><b><u>Duration in days</u></b></td>
        <td><b><u>charges in kenya sh</u></b></td>
    </tr> 
       <tr> 
        <td>{{$groups ->check_in }}</td>
         <td>{{$groups ->check_out }}</td>
          <td>{{$groups ->phone}}</td> 
        <td>{{$groups ->Duration}} </td> 
        <td>{{$groups ->members}} </td> 
        <td>{{$groups ->pay}} </td> 

       
     </tr>
      
        </table>
<div class="hello">
<a href="{{ URL::to('/groups') }}" class="btn btn-success pull-right">back</a> 
</div>
     


@endsection