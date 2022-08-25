@extends('layout.admin-layout')

@section('admin-content')

{{-- <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"> </script>  --}}
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

<script>
       $(function() {
  $('input[name="select_date"]').daterangepicker({
    singleDatePicker: true,
    showDropdowns: true,
    minYear: 2010,
    maxYear: parseInt(moment().format('YYYY'),10),
    locale: {
      format: 'DD-MM-YYYY'
    }
}, function(start, end, label) {
    var date = end.format('YYYY-MM-DD');
    document.getElementById("games_date").value=date;
    var select_date = end.format('DD-MM-YYYY');
    document.getElementById("select_date").value=select_date;

  });
});

    function showDiv(divId, element)
{
    document.getElementById(divId).style.display = element.value == 2 ? 'inline-block' : 'none';
}

</script> 

<div class="bg-white m-2 p-2 text-black rounded-xl">
    <span class="text-2xl font-bold m-3">Edit Game</span>
    <br>
    <div class="m-2">
        <form action="{{route('games-update',$games_detail->id)}}" method="POST">
            @csrf 
            <div class="mb-4  inline-block w-full  m-3"> 
                <label for="game_name" class="block text-gray-700 text-sm font-bold mb-2">Game Name : </label>
                <input type="text" name="games_name" id="games_name" value="{{$games_detail->games_name}}" placeholder="Enter the game name" class="w-full shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-4 mx-3 inline-block md:w-1/3 w-full ">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                Date of Game :
                </label>                 
                <input type="text" name="select_date" id="select_date" value="{{$games_detail->games_date}}" class="shadow appearance-none border w-full rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline ">
                <input type="text" name="games_date" id="games_date" value="{{$games_detail->games_date}}" class="shadow appearance-none border w-full rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline " hidden>    
            </div>
          
            <div class="mx-3 my-1 p-0">
                <label for="is_group" class="inline-flex relative items-center cursor-pointer">
                    @if($games_detail->is_group==1)
                        <input type="checkbox" name="is_group" value=TRUE id="is_group" class="sr-only peer" checked>
                    @else
                        <input type="checkbox" name="is_group" value=TRUE id="is_group" class="sr-only peer" checked>
                    @endif
                    <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-cyan-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-cyan-600"></div>
                    <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300"> Team Match</span>
                  </label>
            </div>
            
            <div class="mx-3 my-1 p-0">
                <label for="separate_by_sex" class="inline-flex relative items-center cursor-pointer">
                    @if($games_detail->separate_by_sex==1)
                        <input type="checkbox" name="separate_by_sex" value=TRUE id="separate_by_sex" class="sr-only peer" checked>
                    @else
                        <input type="checkbox" name="separate_by_sex" value=TRUE id="separate_by_sex" class="sr-only peer">
                    @endif
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