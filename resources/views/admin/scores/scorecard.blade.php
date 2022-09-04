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
    <span class="text-2xl font-bold m-3">Scorecard</span>
    <br>
    <div class="m-2">
        <form action="{{route('scorecard-update',$game_id)}}" method="POST">

            @csrf 
            

            <table class="border-collapse  border border-green-900 w-full">
                @foreach($score_lists as $score_list)
                    <tr class="h-30 border border-black hover:bg-cyan-50 min-h-full p-1">
                        <td class="border border-gray-300 p-3 px-5">

                        <span class="text-xl text-gray-700 font-bold m-3">{{$score_list->player->name}}</span>          
                        <input type="text" name="game_id[]" id="game_id[]" value="{{$score_list->game_id}}" hidden>
                        <input type="text" name="gameplayer_id[]" id="gameplayer_id[]" value="{{$score_list->gameplayer_id}}" hidden>
                        <input type="text" name="player_id[]" id="player_id[]" value="{{$score_list->player_id}}" hidden>      
                        <div class="flex">
                            <span class="mt-1 inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 rounded-l-md border border-r-0 border-gray-300 ">
                                G1
                            </span>
                            <input type="text" id="gate_1" name="gate_1[]" value="{{$score_list->gate_1}}" autocomplete="off" class="mt-1 rounded-none rounded-r-lg bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block  w-1/12 text-sm border-gray-300 p-2.5 " placeholder="Gate 1">
                            &nbsp;
                            <span class="mt-1 inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 rounded-l-md border border-r-0 border-gray-300 ">
                                G2
                            </span>
                            <input type="text" id="gate_2" name="gate_2[]" value="{{$score_list->gate_2}}" autocomplete="off" class=" mt-1 rounded-none rounded-r-lg bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block w-1/12 text-sm border-gray-300 p-2.5  " placeholder="Gate 2">
                            &nbsp;
                            <span class="mt-1 inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 rounded-l-md border border-r-0 border-gray-300 ">
                                G3
                            </span>
                            <input type="text" id="gate_3" name="gate_3[]" value="{{$score_list->gate_3}}" autocomplete="off" class=" mt-1 rounded-none rounded-r-lg bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block w-1/12 text-sm border-gray-300 p-2.5  " placeholder="Gate 3">
                            &nbsp;
                            <span class="mt-1 inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 rounded-l-md border border-r-0 border-gray-300 ">
                                G4
                            </span>
                            <input type="text" id="gate_4" name="gate_4[]" value="{{$score_list->gate_4}}" autocomplete="off" class=" mt-1 rounded-none rounded-r-lg bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block w-1/12 text-sm border-gray-300 p-2.5  " placeholder="Gate 4">
                            &nbsp;
                            <span class="mt-1 inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 rounded-l-md border border-r-0 border-gray-300 ">
                                G5
                            </span>
                            <input type="text" id="gate_5" name="gate_5[]" value="{{$score_list->gate_5}}" autocomplete="off" class=" mt-1 rounded-none rounded-r-lg bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block w-1/12 text-sm border-gray-300 p-2.5  " placeholder="Gate 5">
                            &nbsp;
                            <span class="mt-1 inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 rounded-l-md border border-r-0 border-gray-300 ">
                                G6
                            </span>
                            <input type="text" id="gate_6" name="gate_6[]" value="{{$score_list->gate_6}}" autocomplete="off" class=" mt-1 rounded-none rounded-r-lg bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block w-1/12 text-sm border-gray-300 p-2.5  " placeholder="Gate 6">
                        </div>
                        <div class="flex">
                            <span class="mt-1 inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 rounded-l-md border border-r-0 border-gray-300 ">
                                G7
                            </span>
                            <input type="text" id="gate_7" name="gate_7[]" value="{{$score_list->gate_7}}" autocomplete="off" class=" mt-1 rounded-none rounded-r-lg bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block w-1/12 text-sm border-gray-300 p-2.5  " placeholder="Gate 7">
                            &nbsp;
                            <span class="mt-1 inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 rounded-l-md border border-r-0 border-gray-300 ">
                                G8
                            </span>
                            <input type="text" id="gate_8" name="gate_8[]" value="{{$score_list->gate_8}}" autocomplete="off" class=" mt-1 rounded-none rounded-r-lg bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block w-1/12 text-sm border-gray-300 p-2.5  " placeholder="Gate 8">
                            &nbsp;
                            <span class="mt-1 inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 rounded-l-md border border-r-0 border-gray-300 ">
                                G9
                            </span>
                            <input type="text" id="gate_9" name="gate_9[]" value="{{$score_list->gate_9}}" autocomplete="off" class=" mt-1 rounded-none rounded-r-lg bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block w-1/12 text-sm border-gray-300 p-2.5  " placeholder="Gate 9">
                            &nbsp;
                            <span class="mt-1 inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 rounded-l-md border border-r-0 border-gray-300 ">
                                G10
                            </span>
                            <input type="text" id="gate_10" name="gate_10[]" value="{{$score_list->gate_10}}" autocomplete="off" class=" mt-1 rounded-none rounded-r-lg bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block w-1/12 text-sm border-gray-300 p-2.5  " placeholder="Gate 10">
                            &nbsp;
                            <span class="mt-1 inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 rounded-l-md border border-r-0 border-gray-300 ">
                                G11
                            </span>
                            <input type="text" id="gate_11" name="gate_11[]" value="{{$score_list->gate_11}}" autocomplete="off" class=" mt-1 rounded-none rounded-r-lg bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block w-1/12 text-sm border-gray-300 p-2.5  " placeholder="Gate 11">
                            &nbsp;
                            <span class="mt-1 inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 rounded-l-md border border-r-0 border-gray-300 ">
                                G12
                            </span>
                            <input type="text" id="gate_12" name="gate_12[]" value="{{$score_list->gate_12}}" autocomplete="off" class=" mt-1 rounded-none rounded-r-lg bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block w-1/12 text-sm border-gray-300 p-2.5  " placeholder="Gate 12">
                            </div>
                            <div class="flex">
                                
                            {{-- <span class="mt-1 inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 rounded-l-md border border-r-0 border-gray-300 ">
                                Final Score
                            </span>
                            <input type="text" id="final_score" name="final_score[]" value="{{$score_list->final_score}}" autocomplete="off" class=" mt-1 rounded-none rounded-r-lg bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block w-1/12 text-sm border-gray-300 p-2.5  " placeholder="Final Score">
                         --}}
                        </div>
                    </td>
                    
                </tr>
                @endforeach
            </table>
            <div class="mb-4 inline-block md:w-1/3 w-full  m-3">                 
                {{-- <button type="reset" class="bg-red-600 hover:bg-red-500 text-white rounded-lg shadow-lg p-2">Reset </button> --}}
                <button type="submit" class="bg-green-600 hover:bg-green-500 text-white rounded-lg shadow-lg p-2">Submit &rarr; </button>
            </div>


        </form>
    </div>
</div>

@endsection