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
    <span class="text-2xl font-bold m-2 my-3">Players Configuration</span>
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
        <div class="m-2">
        <a href="{{route('players-add')}}" class=" p-2 bg-green-600 hover:bg-green-500 rounded-lg text-white shadow-lg">+ Add New Player</a>
    </div>
    <div class="m-2">
        <table class="border-collapse border border-green-900 w-full">
            <thead>
                <tr class="bg-gray-200 p-3 font-bold">
                    <td width="50%" class="border border-blue-900 p-3 display-none">Player's Name</td>
                    <td width="30%" class="border border-blue-900 p-3">Organisation</td>
                    <td width="20%" class="border border-blue-900 p-3">Action</td>
                </tr>
            </thead>
            <tbody>
                @if($player_lists->count()==0)
                    <tr>
                        <td colspan=5>Empty List <br>(contact administrator if you think this is an error)</td>
                    </tr>
                @else
                    @foreach($player_lists as $player_list)

                        <tr class="h-30 border border-black hover:bg-cyan-50 text-center min-h-full">
                            <td class="border border-gray-300 p-3 px-5 display-none">[{{$player_list->sex}}]-{{$player_list->name}}</td>
                            <td class="border border-gray-300 p-3 px-5">{{$player_list->organisation}}</td>
                            <td class="border border-gray-300 p-3 px-5 ">
                                <div class="inline-flex">
                                {{-- edit button --}}
                                <form action="" method="GET">
                                    @csrf 
                                    <button type="submit" class="bg-yellow-500 hover:bg-yellow-400 rounded-lg p-2 m-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </button>
                                </form>
                                {{-- delete button --}}
                                <form action="/admin/players/delete/{{$player_list->id}}" method="POST" onsubmit="return confirm('Are you sure to delete {{$player_list->name}} ?')">
                                    @csrf 
                                    <button type="submit" class="bg-red-500 hover:bg-red-400 rounded-lg p-2 m-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                        </svg>
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