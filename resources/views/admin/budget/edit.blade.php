@extends('layout.admin-layout')

@section('admin-content')

<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"> </script>  

<div class="bg-white m-2 p-2 text-black rounded-xl">
    <span class="text-2xl font-bold m-3">Edit Budget Entry</span>
    <br>
    <div class="m-2">
        <form action="{{route('budget-update',$budget_detail->id)}}" method="POST">
            @csrf 
            <div class="mb-4  inline-block md:w-1/3 w-full  m-3"> 
                <label for="estate_id" class="block text-gray-700 text-sm font-bold mb-2">Estate : </label><p>{{$budget_detail->estate->estate_name}}</p>
                {{-- <select name="estate_id" id="estate_id" class="w-full shadow border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    @foreach($estates as $estate)
                        <option value="{{$estate->id}}">{{$estate->abbreviation}} - {{$estate->estate_name}}</option>
                    @endforeach
                </select> --}}
            </div>
            <?php 
            $current_year=date("Y");
            $next_year=$current_year+1;
            // dd($next_year);
            ?>
            <div class="mb-4 inline-block md:w-1/12 w-full  m-3"> 
                <label for="estate_name" class="block text-gray-700 text-sm font-bold mb-2"> Year: 
                    <input type="text" name="year" id="year" value="<?php echo $next_year;?>" class="w-full shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></td>
                    </label>
            </div>

            <div>
                <table class="border-collapse w-full">
                    <thead>
                        <tr class="bg-cyan-700 text-white">
                            <td width="33%" class="border-y border-blue-900 p-3 text-center">Month</td>
                            <td width="33%" class="border-y border-blue-900 p-3 text-center">Estimated FFB Yield (MT)</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="h-30 text-center min-h-full border-y border-blue-900 bg-cyan-600/50">
                            <td class="">January</td>
                            
                            <td><input type="text" name="jan_budget_mt" value="{{$budget_detail->jan_budget_mt}}" id="jan_budget_mt" class="w-3/4 shadow appearance-none rounded py-2 text-gray-700 leading-tight focus:outline-y focus:shadow-outline">MT</td>                            
                        </tr>
                        <tr class="h-30 text-center min-h-full border-y border-blue-900 bg-cyan-600/50">
                            <td class="">February</td>
                            <td><input type="text" name="feb_budget_mt" value="{{$budget_detail->feb_budget_mt}}" id="feb_budget_mt" class="w-3/4 shadow appearance-none rounded py-2 text-gray-700 leading-tight focus:outline-y focus:shadow-outline">MT</td>
                         
                        </tr>
                        <tr class="h-30 text-center min-h-full border-y border-blue-900 bg-cyan-600/50">
                            <td class="">March</td>
                            <td><input type="text" name="mac_budget_mt" value="{{$budget_detail->mac_budget_mt}}" id="mac_budget_mt" class="w-3/4 shadow appearance-none rounded py-2 text-gray-700 leading-tight focus:outline-y focus:shadow-outline">MT</td>
                        </tr>
                        <tr class="h-30 text-center min-h-full border-y border-blue-900 bg-cyan-600/50">
                            <td class="">April</td>
                            <td><input type="text" name="apr_budget_mt" value="{{$budget_detail->apr_budget_mt}}" id="apr_budget_mt" class="w-3/4 shadow appearance-none rounded py-2 text-gray-700 leading-tight focus:outline-y focus:shadow-outline">MT</td>
                        </tr>
                        <tr class="h-30 text-center min-h-full border-y border-blue-900 bg-cyan-600/50">
                            <td class="">May</td>
                            <td><input type="text" name="may_budget_mt" value="{{$budget_detail->may_budget_mt}}" id="may_budget_mt" class="w-3/4 shadow appearance-none rounded py-2 text-gray-700 leading-tight focus:outline-y focus:shadow-outline">MT</td>
                        </tr>
                        <tr class="h-30 text-center min-h-full border-y border-blue-900 bg-cyan-600/50">
                            <td class="">June</td>
                            <td><input type="text" name="june_budget_mt" value="{{$budget_detail->june_budget_mt}}" id="june_budget_mt" class="w-3/4 shadow appearance-none rounded py-2 text-gray-700 leading-tight focus:outline-y focus:shadow-outline">MT</td>
                        </tr>
                        <tr class="h-30 text-center min-h-full border-y border-blue-900 bg-cyan-600/50">
                            <td class="">July</td>
                            <td><input type="text" name="july_budget_mt" value="{{$budget_detail->july_budget_mt}}" id="july_budget_mt" class="w-3/4 shadow appearance-none rounded py-2 text-gray-700 leading-tight focus:outline-y focus:shadow-outline">MT</td>
                        </tr>
                        <tr class="h-30 text-center min-h-full border-y border-blue-900 bg-cyan-600/50">
                            <td class="">August</td>
                            <td><input type="text" name="aug_budget_mt" value="{{$budget_detail->aug_budget_mt}}" id="aug_budget_mt" class="w-3/4 shadow appearance-none rounded py-2 text-gray-700 leading-tight focus:outline-y focus:shadow-outline">MT</td>
                        </tr>
                        <tr class="h-30 text-center min-h-full border-y border-blue-900 bg-cyan-600/50">
                            <td class="">September</td>
                            <td><input type="text" name="sept_budget_mt" value="{{$budget_detail->sept_budget_mt}}" id="sept_budget_mt" class="w-3/4 shadow appearance-none rounded py-2 text-gray-700 leading-tight focus:outline-y focus:shadow-outline">MT</td>
                        </tr>
                        <tr class="h-30 text-center min-h-full border-y border-blue-900 bg-cyan-600/50">
                            <td class="">October</td>
                            <td><input type="text" name="oct_budget_mt" value="{{$budget_detail->oct_budget_mt}}" id="oct_budget_mt" class="w-3/4 shadow appearance-none rounded py-2 text-gray-700 leading-tight focus:outline-y focus:shadow-outline">MT</td>
                        </tr>
                        <tr class="h-30 text-center min-h-full border-y border-blue-900 bg-cyan-600/50">
                            <td class="">November</td>
                            <td><input type="text" name="nov_budget_mt" value="{{$budget_detail->nov_budget_mt}}" id="nov_budget_mt" class="w-3/4 shadow appearance-none rounded py-2 text-gray-700 leading-tight focus:outline-y focus:shadow-outline">MT</td>
                        </tr>
                        <tr class="h-30 text-center min-h-full border-y border-blue-900 bg-cyan-600/50">
                            <td class="">December</td>
                            <td><input type="text" name="dec_budget_mt" value="{{$budget_detail->dec_budget_mt}}" id="dec_budget_mt" class="w-3/4 shadow appearance-none rounded py-2 text-gray-700 leading-tight focus:outline-y focus:shadow-outline">MT</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <br>
            <div class="mb-4 inline-block md:w-1/3 w-full m-3">                 
                <button type="reset" class="bg-red-600 hover:bg-red-500 text-white rounded-lg shadow-lg p-2">Reset Form </button>
                <button type="submit" class="bg-green-600 hover:bg-green-500 text-white rounded-lg shadow-lg p-2">Submit &rarr; </button>
            </div>


        </form>
    </div>
</div>

@endsection