@extends('layout.admin-layout')

@section('admin-content')

<style>
    @media only screen and (max-width: 900px) {
    .display-none{
        display: none;
    }
}
</style>
<div class="bg-white m-2 p-2 text-black rounded-xl">
    <span class="text-2xl font-bold m-2 my-3">Scoreboard</span>
    <br>
    <div class="m-2">
        <table class="border-collapse border border-green-900 w-full">
            <thead>
                <tr class="bg-gray-200 p-3 font-bold">
                    <td width="50%" class="border border-blue-900 p-3 ">Game</td>
                </tr>
            </thead>
            <tbody>
                @if($game_details->count()==0)
                    <tr>
                        <td colspan=5>Empty List <br>(contact administrator if you think this is an error)</td>
                    </tr>
                @else
                    @foreach($game_details as $game_detail)

                        <tr class="h-30 border border-black hover:bg-cyan-50 text-center min-h-full">
                            <td class="border border-gray-300 p-3 px-5 ">[{{$game_detail->games_date}}]-{{$game_detail->games_name}}
                                <br>
                            
                                <div class="inline-flex">

                                {{-- view scoreboard button --}}
                                <form action="/scoreboard/{{$game_detail->id}}" method="POST">
                                    @csrf 
                                    <button type="submit" class="bg-cyan-500 hover:bg-cyan-400 rounded-lg p-2 m-2">View Scoreboard</button>
                                </form>
                            </div>
                            </td>
                        </tr>
                    @endforeach
                @endif

            </tbody>
        </table>
    </div>
</div>

@endsection