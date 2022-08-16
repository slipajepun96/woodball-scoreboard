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
    <span class="text-2xl font-bold m-2 my-3">Games Setting</span>
    <br>
    @if(session('status'))
        <div class="bg-yellow-400 text-black p-2 rounded m-3" id="status_message">
            <div class="flex-row">{{session('status')}}
              </div>
        </div>
    @endif
        <div class="m-2">
        <a href="" class=" p-2 bg-green-600 hover:bg-green-500 rounded-lg text-white shadow-lg">+ Add New Games</a>
    </div>
    <div class="m-2">
        <table class="border-collapse border border-green-900 w-full">
            <thead>
                <tr class="bg-gray-200 p-3 font-bold">
                    <td width="5%" class="border border-blue-900 p-3 display-none">Date of Match</td>
                    <td width="35%" class="border border-blue-900 p-3">Game Name</td>
                    {{-- <td width="60" class="border border-blue-900 p-3">Action</td> --}}
                </tr>
            </thead>
            <tbody>
                @if($games_lists->count()==0)
                    <tr>
                        <td colspan=5>Empty List <br>(contact administrator if you think this is an error)</td>
                    </tr>
                @else
                @foreach($games_lists as $games_list)

  
                    <tr class="h-30 border border-black hover:bg-cyan-50 text-center min-h-full">
                        <td class="border border-gray-300 p-3 px-5 display-none">{{$games_list->games_date}}</td>
                        <td class="border border-gray-300 p-3 px-5">{{$games_list->games_name}}
                        {{-- </td>
                        <td class="border border-gray-300 p-3 px-5 "> --}}
                            <br>
                            <div class="inline-flex">
                            {{-- score button --}}
                            <a href=""><button class="bg-green-500 hover:bg-green-400 rounded-lg p-2 m-1">Score Form</button></a>
                            {{--player button --}}
                            <a href=""><button class="bg-green-500 hover:bg-green-400 rounded-lg p-2 m-1">Score Form</button></a>
                            {{--player button --}}
                            <a href=""><button class="bg-green-500 hover:bg-green-400 rounded-lg p-2 m-1">Game's Players</button></a>
                            {{-- edit button --}}
                            <form action="/admin/ffb/games/edit/" method="GET">
                                @csrf 
                                <button type="submit" class="bg-yellow-500 hover:bg-yellow-400 rounded-lg p-2 m-1">
                                    Edit Game
                                </button>
                            </form>
                            {{-- delete button --}}
                            <form action="/admin/ffb/games/delete/" method="POST" onsubmit="return confirm('Are you sure to delete games ?')">
                                @csrf 
                                <button type="submit" class="bg-red-500 hover:bg-red-400 rounded-lg p-2 m-1">
                                    Delete
                                </button>
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