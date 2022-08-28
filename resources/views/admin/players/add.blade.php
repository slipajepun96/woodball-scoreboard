@extends('layout.admin-layout')

@section('admin-content')

{{-- <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"> </script>  --}}
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

<script>

    function showDiv(divId, element)
{
    document.getElementById(divId).style.display = element.value == 2 ? 'inline-block' : 'none';
}

</script> 

<div class="bg-white m-2 p-2 text-black rounded-xl">
    <span class="text-2xl font-bold m-3">Add New Player</span>
    <br>
    <div class="m-2">
        <form action="{{route('players-store')}}" method="POST">
            @csrf 
            <div class="mb-4  inline-block w-full  m-3"> 
                <label for="game_name" class="block text-gray-700 text-sm font-bold mb-2">Player Name : </label>
                <input type="text" name="name" id="name" placeholder="Enter player name" class="w-full shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-4  inline-block w-full  m-3"> 
                <label for="game_name" class="block text-gray-700 text-sm font-bold mb-2">Organisation Name : </label>
                <input type="text" name="organisation" id="organisation" placeholder="Enter player's organisation name" class="w-full shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-4  inline-block w-full  m-3"> 
            Sex
                <div class="flex items-center mb-4 w-1/2">
                    <input id="country-option-1" type="radio" name="sex" value="M" class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-600 dark:focus:bg-blue-600 dark:bg-gray-700 dark:border-gray-600" checked>
                    <label for="country-option-1" class="block ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                    Male
                    </label>
                 &nbsp;&nbsp;&nbsp;
                    <input id="country-option-1" type="radio" name="sex" value="F" class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-600 dark:focus:bg-blue-600 dark:bg-gray-700 dark:border-gray-600">
                    <label for="country-option-1" class="block ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                    Female
                    </label>
                </div>
            </div>

            </div>
            <br>
            <div class="mb-4 inline-block md:w-1/3 w-full  m-3">                 
                <button type="reset" class="bg-red-600 hover:bg-red-500 text-white rounded-lg shadow-lg p-2">Reset </button>
                <button type="submit" class="bg-green-600 hover:bg-green-500 text-white rounded-lg shadow-lg p-2">Submit &rarr; </button>
            </div>


        </form>
    </div>
</div>

@endsection