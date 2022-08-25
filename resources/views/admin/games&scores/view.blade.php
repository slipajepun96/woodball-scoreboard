@extends('layout.admin-layout')

@section('admin-content')

{{-- <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"> </script>  --}}
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />



<div class="bg-white m-2 p-2 text-black rounded-xl">
    <span class="text-3xl font-bold m-3">{{$games_detail->games_name}}</span><br><hr>
    <span class="text-lg text-gray-700 m-3">Game Summary</span>
    <br>
    <div class="">
        <span class="text-md m-3">Date : {{$games_detail->games_date}}</span>
        <span class="text-md m-3">Course : Laman Woodball Mini, Ladang PKPP Paloh Hinai</span>
    </div>
    <br><br>
    <hr>
    <span class="text-lg text-gray-700 m-3">Players Summary</span>

</div>

@endsection