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
    <span class="text-2xl font-bold m-2 my-3">Add Players To Game</span><br>
    <span class="text-xl m-2 my-3">{{$games_detail->games_name}}</span>
    <br>
    @if(session('status'))
        <div class="bg-green-400 text-black p-2 rounded m-3" id="status_message">
            <div class="flex-row">{{session('status')}}
              </div>
        </div>
    @endif
    @if(session('delete'))
    <div class="bg-red-200 text-black p-2 rounded m-3" id="status_message">
        <div class="flex-row">{{session('delete')}}
          </div>
    </div>
    @endif  
    <?php $i=1;?>
    @foreach($data_array[1] as $gameplayer)
        @if($gameplayer->game_id==$games_detail->id)
            <?php $added_player[$i]=$gameplayer->player_id;
            $i=$i+1; ?>
        @endif
    @endforeach
    @if($added_player[0]=null)
    <?php $added_player[0]=9999;?>
    @endif

        <table class="border-collapse border border-green-900 w-full">
            <thead>
                <tr class="bg-gray-200 p-3 font-bold">
                    <td width="50%" class="border border-blue-900 p-3 display-none">Player's Name</td>
                    <td width="20%" class="border border-blue-900 p-3">Action</td>
                </tr>
            </thead>
            <tbody>
                {{-- @if($data_array[0]->count()==0)
                    <tr>
                        <td colspan=5>Empty List <br>(contact administrator if you think this is an error)</td>
                    </tr>
                @else --}}
                    @foreach($data_array[0] as $player_list)

                        
                        <tr class="h-30 border border-black hover:bg-cyan-50 text-center min-h-full">
                            <td class="border border-gray-300 p-3 px-5 display-none">{{$player_list->name}} - {{$player_list->organisation}}</td>
                            <td class="border border-gray-300 p-3 px-5 ">
                            
                                
                                <?php $num= count($added_player); ?>
                                {{-- remove from game button --}}



                                <?php $added_status=0;?>
                                @for($i=0;$i<$num;$i++)
                                @if($added_player[$i]==$player_list->id)
                                    <?php $added_status=1; ?>
                                @endif
                                @endfor
                                @if($added_status==1)
                                <span class="text-green-700">Added to game</span><br>
                                <form action="/admin/games/players/delete" method="POST" onsubmit="return confirm('Are you sure to delete {{$player_list->name}} ?')">
                                    @csrf 
                                    <input type="text" name="game_id" id="game_id" value="{{$games_detail->id}}" hidden>
                                    <input type="text" name="player_id" id="player_id" value="{{$player_list->id}}" hidden>
                                    <button type="submit" class="text-white bg-red-700 hover:bg-red-400 rounded-lg p-2 m-2">
                                     Remove from game
                                    </button>
                                </form>
                                @endif
                                
                                 {{-- add to game button --}}
                                <?php $not_added_status=0;?>
                                @for($i=0;$i<$num;$i++)
                                @if($added_player[$i]==$player_list->id)
                                    <?php $not_added_status=2; ?>
                                @endif
                                @endfor
                                @if($not_added_status==0)
                              
                                <form action="/admin/games/players/add" method="POST" id="add_player">
                                    @csrf 
                                    <input type="text" name="game_id" id="game_id" value="{{$games_detail->id}}" hidden>
                                    <input type="text" name="player_id" id="player_id" value="{{$player_list->id}}" hidden>
                                    <input type="text" name="sex" id="sex" value="{{$player_list->sex}}" hidden>
                                    <button type="submit" class="text-white bg-green-700 hover:bg-green-500 rounded-lg p-2 m-2">Add to Game</button>
                                </form>
                                @endif
                               
                                
                             
                            </div>
                            </td>
                        </tr>
                        
                    @endforeach
                {{-- @endif --}}

            </tbody>
        </table>

        <script>
            // $(document).ready(function() 
            // {
            //     console.log("1");
            //     fetchPlayer(<?php $games_detail->id ?>);
            //     function fetchPlayer($id)
            //     {
            //         console.log(1);
            //         $.ajax({
            //         url: "",
            //         type:"GET",
            //         dataType:"json",
            //         success:function(response) 
            //         {
            //             console.log(response.$games_detail);
            //         });
            //     }


                // $('#add_player').on('submit',function(e){
                // e.preventDefault();

                // let _token=$("input[name=_token]").val();
                // let game_id = $('#game_id').val();
                // let player_id = $('#player_id').val();

                // console.log('player_id');
                
                // $.ajax({
                // url: ",
                // type:"POST",
                // data:{
                //     _token:_token,
                //     game_id:game_id,
                //     player_id:player_id,
                // },
                // success:function(response){
                //     $('#successMsg').show();
                //     console.log(response);
                // },
                // });
                // });
            })
        </script>
    </div>
</div>

@endsection