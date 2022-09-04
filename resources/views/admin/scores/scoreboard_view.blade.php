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
    <span class="text-3xl font-bold m-2 my-3">Scoreboard</span><br>
    <span class="text-xl m-2 my-3">{{$game_detail->games_name}} - {{$game_detail->games_date}}</span>
    <br>
    <div class="inline-flex">
        <!--<a href="#male" class="bg-cyan-500 hover:bg-cyan-400 rounded-lg p-2 m-2">Male</a><a href="#female" class="bg-pink-300 hover:bg-pink-200 rounded-lg p-2 m-2">Female</a> --><button onClick="window.location.reload();" class="bg-green-700 hover:bg-green-400 text-white rounded-lg p-2 m-2">Refresh</button>
    </div>
    <div class="m-2">


        <table class="border-collapse border border-green-900 w-full">
            <thead>
                <tr class="bg-cyan-200 p-3 font-bold">
                    <td colspan="3" class="border border-blue-900 p-3 "><span class="text-xl font-bold">Category : Male</span></td>
                </tr>
                <tr class="bg-gray-200 p-3 font-bold">
                    <td width="10%" class="border border-blue-900 p-3 ">Ranking</td>
                    <td width="70%" class="border border-blue-900 p-3 ">Name</td>
                    <td width="20%" class="border border-blue-900 p-3 ">Score</td>
                </tr>
            </thead>
            <tbody>
                @if($score_lists->count()==0)
                    <tr>
                        <td colspan=5>Empty List <br>(contact administrator if you think this is an error)</td>
                    </tr>
                @else
                <?php $i=1; ?>
                    @foreach($score_lists as $score_list)
                        @if($score_list->player->sex=='M')
                        <tr class="h-30 border border-black hover:bg-cyan-50 text-center min-h-full">
                            <td class="border border-gray-300 p-3 "><?php echo $i; $i=$i+1;?></td>
                            <td class="border border-gray-300 p-3 ">{{$score_list->player->name}}</td>
                            <td class="border border-gray-300 p-3 ">{{$score_list->final_score}}</td>
                                
                            
                                <div class="inline-flex">

                                {{-- view scoreboard button --}}
                                {{-- <form action="" method="POST">
                                    @csrf 
                                    <button type="submit" class="bg-cyan-500 hover:bg-cyan-400 rounded-lg p-2 m-2">View Scoreboard</button>
                                </form>
                            </div> --}}
                            </td>
                        </tr>
                        @endif
                    @endforeach
                @endif

            </tbody>
        </table>

        {{-- female category --}}
        <table class="border-collapse border border-green-900 w-full" id="#female">
            <thead>
                <tr class="bg-pink-200 p-3 font-bold">
                    <td colspan="3" class="border border-blue-900 p-3 "><span class="text-xl font-bold">Category : Female</span></td>
                </tr>
                <tr class="bg-gray-200 p-3 font-bold">
                    <td width="10%" class="border border-blue-900 p-3 ">Ranking</td>
                    <td width="70%" class="border border-blue-900 p-3 ">Name</td>
                    <td width="20%" class="border border-blue-900 p-3 ">Score</td>
                </tr>
            </thead>
            <tbody>
                @if($score_lists->count()==0)
                    <tr>
                        <td colspan=5>Empty List <br>(contact administrator if you think this is an error)</td>
                    </tr>
                @else
                <?php $i=1; ?>
                    @foreach($score_lists as $score_list)
                        @if($score_list->player->sex=='F')
                        <tr class="h-30 border border-black hover:bg-cyan-50 text-center min-h-full">
                            <td class="border border-gray-300 p-3 "><?php echo $i; $i=$i+1;?></td>
                            <td class="border border-gray-300 p-3 ">{{$score_list->player->name}}</td>
                            <td class="border border-gray-300 p-3 ">{{$score_list->final_score}}</td>
                                
                            
                                <div class="inline-flex">

                                {{-- view scoreboard button --}}
                                {{-- <form action="" method="POST">
                                    @csrf 
                                    <button type="submit" class="bg-cyan-500 hover:bg-cyan-400 rounded-lg p-2 m-2">View Scoreboard</button>
                                </form>
                            </div> --}}
                            </td>
                        </tr>
                        @endif
                    @endforeach
                @endif

            </tbody>
        </table>
    </div>
</div>

@endsection