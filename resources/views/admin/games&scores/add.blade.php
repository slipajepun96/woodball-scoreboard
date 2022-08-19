@extends('layout.admin-layout')

@section('admin-content')

<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"> </script>  

<div class="bg-white m-2 p-2 text-black rounded-xl">
    <span class="text-2xl font-bold m-3">Add New Game</span>
    <br>
    <div class="m-2">
        <form action="" method="POST">
            @csrf 
            <div class="mb-4  inline-block w-full  m-3"> 
                <label for="game_name" class="block text-gray-700 text-sm font-bold mb-2">Game Name : </label>
                <input type="text" name="year" id="year" placeholder="Enter the game name" class="w-full shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></td>
                
            </div>
          
            <div class="mx-3 my-1 p-0">
                <label for="default-toggle1" class="inline-flex relative items-center cursor-pointer">
                    <input type="checkbox" value="" id="default-toggle1" class="sr-only peer">
                    <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-cyan-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-cyan-600"></div>
                    <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300"> Team Match</span>
                  </label>
            </div>
            
            <div class="mx-3 my-1 p-0">
                <label for="default-toggle" class="inline-flex relative items-center cursor-pointer">
                    <input type="checkbox" value="" id="default-toggle" class="sr-only peer">
                    <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-cyan-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-cyan-600"></div>
                    <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300"> Separate by sex</span>
                  </label>
                </div>

            <div>
               
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