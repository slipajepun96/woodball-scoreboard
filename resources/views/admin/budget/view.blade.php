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
    <span class="text-2xl font-bold m-2 my-3">{{$budget_detail->estate->estate_name}}'s {{$budget_detail->year}} Budget</span>
    <br>

        <div class="m-2">
        <a href="{{route('budget-index')}}"><button class=" p-2 bg-yellow-400 hover:bg-yellow-400 rounded-lg text-black shadow-lg inline-flex">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 18 18" fill="currentColor">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm.707-10.293a1 1 0 00-1.414-1.414l-3 3a1 1 0 000 1.414l3 3a1 1 0 001.414-1.414L9.414 11H13a1 1 0 100-2H9.414l1.293-1.293z" clip-rule="evenodd" />
              </svg>&nbsp;Back
            
            </button></a>
            {{-- <a href="{{route('estate-view-print',$estate_detail->id)}}"><button class="bg-green-500 hover:bg-green-400 rounded-lg p-2 m-2">Print PDF --}}
            </button></a>
    </div>
    <div class="m-2">
        <table class="border-collapse border border-green-900 w-full">
            <thead>
                <tr class="bg-gray-200 p-3 font-bold">
                    <td width="5%" class="border border-blue-900 p-3">Estate Name</td>
                    <td width="30%" class="border border-blue-900 p-3" colspan="2">{{$budget_detail->estate->estate_name}}</td>
                </tr>
                <tr class="bg-gray-200 p-3 font-bold">
                    <td width="10%" class="border border-blue-900 p-3">Month</td>
                    <td width="30%" class="border border-blue-900 p-3">Estimated FFB Yield (MT)</td>
                    <td width="30%" class="border border-blue-900 p-3">Estimated Daily FFB Yield (MT)</td>
                </tr>
            </thead>
            <tbody>      
            <?php
            $total=0;
             ?>         
                    <tr class="h-30 border border-black hover:bg-cyan-50 min-h-full">
                        <td class="p-3 px-5 border border-black">January</td>
                        <td class="p-3 px-5 border border-black">{{$budget_detail->jan_budget_mt}}</td>
                        <td class="p-3 px-5 border border-black">{{$budget_detail->jan_daily_budget_mt}}</td>
                        <?php $total=$total+$budget_detail->jan_budget_mt; ?>
                    </tr>
                    <tr class="h-30 border border-black hover:bg-cyan-50 min-h-full">
                        <td class="p-3 px-5 border border-black">February</td>
                        <td class="p-3 px-5 border border-black">{{$budget_detail->feb_budget_mt}}</td>
                        <td class="p-3 px-5 border border-black">{{$budget_detail->feb_daily_budget_mt}}</td>
                        <?php $total=$total+$budget_detail->feb_budget_mt; ?>
                    </tr>
                    <tr class="h-30 border border-black hover:bg-cyan-50 min-h-full">
                        <td class="p-3 px-5 border border-black">March</td>
                        <td class="p-3 px-5 border border-black">{{$budget_detail->mac_budget_mt}}</td>
                        <td class="p-3 px-5 border border-black">{{$budget_detail->mac_daily_budget_mt}}</td>
                        <?php $total=$total+$budget_detail->mac_budget_mt; ?>
                    </tr>
                    <tr class="h-30 border border-black hover:bg-cyan-50 min-h-full">
                        <td class="p-3 px-5 border border-black">April</td>
                        <td class="p-3 px-5 border border-black">{{$budget_detail->apr_budget_mt}}</td>
                        <td class="p-3 px-5 border border-black">{{$budget_detail->apr_daily_budget_mt}}</td>
                        <?php $total=$total+$budget_detail->apr_budget_mt; ?>
                    </tr>
                    <tr class="h-30 border border-black hover:bg-cyan-50 min-h-full">
                        <td class="p-3 px-5 border border-black">May</td>
                        <td class="p-3 px-5 border border-black">{{$budget_detail->may_budget_mt}}</td>
                        <td class="p-3 px-5 border border-black">{{$budget_detail->may_daily_budget_mt}}</td>
                        <?php $total=$total+$budget_detail->may_budget_mt; ?>
                    </tr>
                    <tr class="h-30 border border-black hover:bg-cyan-50 min-h-full">
                        <td class="p-3 px-5 border border-black">June</td>
                        <td class="p-3 px-5 border border-black">{{$budget_detail->june_budget_mt}}</td>
                        <td class="p-3 px-5 border border-black">{{$budget_detail->june_daily_budget_mt}}</td>
                        <?php $total=$total+$budget_detail->june_budget_mt; ?>
                    </tr>
                    <tr class="h-30 border border-black hover:bg-cyan-50 min-h-full">
                        <td class="p-3 px-5 border border-black">July</td>
                        <td class="p-3 px-5 border border-black">{{$budget_detail->july_budget_mt}}</td>
                        <td class="p-3 px-5 border border-black">{{$budget_detail->july_daily_budget_mt}}</td>
                        <?php $total=$total+$budget_detail->july_budget_mt; ?>
                    </tr>
                    <tr class="h-30 border border-black hover:bg-cyan-50 min-h-full">
                        <td class="p-3 px-5 border border-black">August</td>
                        <td class="p-3 px-5 border border-black">{{$budget_detail->aug_budget_mt}}</td>
                        <td class="p-3 px-5 border border-black">{{$budget_detail->aug_daily_budget_mt}}</td>
                        <?php $total=$total+$budget_detail->aug_budget_mt; ?>
                    </tr>
                    <tr class="h-30 border border-black hover:bg-cyan-50 min-h-full">
                        <td class="p-3 px-5 border border-black">September</td>
                        <td class="p-3 px-5 border border-black">{{$budget_detail->sept_budget_mt}}</td>
                        <td class="p-3 px-5 border border-black">{{$budget_detail->sept_daily_budget_mt}}</td>
                        <?php $total=$total+$budget_detail->sept_budget_mt; ?>
                    </tr>
                    <tr class="h-30 border border-black hover:bg-cyan-50 min-h-full">
                        <td class="p-3 px-5 border border-black">October</td>
                        <td class="p-3 px-5 border border-black">{{$budget_detail->oct_budget_mt}}</td>
                        <td class="p-3 px-5 border border-black">{{$budget_detail->oct_daily_budget_mt}}</td>
                        <?php $total=$total+$budget_detail->oct_budget_mt; ?>
                    </tr>
                    <tr class="h-30 border border-black hover:bg-cyan-50 min-h-full">
                        <td class="p-3 px-5 border border-black">November</td>
                        <td class="p-3 px-5 border border-black">{{$budget_detail->nov_budget_mt}}</td>
                        <td class="p-3 px-5 border border-black">{{$budget_detail->nov_daily_budget_mt}}</td>
                        <?php $total=$total+$budget_detail->nov_budget_mt; ?>
                    </tr>
                    <tr class="h-30 border border-black hover:bg-cyan-50 min-h-full">
                        <td class="p-3 px-5 border border-black">December</td>
                        <td class="p-3 px-5 border border-black">{{$budget_detail->dec_budget_mt}}</td>
                        <td class="p-3 px-5 border border-black">{{$budget_detail->dec_daily_budget_mt}}</td>
                        <?php $total=$total+$budget_detail->dec_budget_mt; ?>
                    </tr>
                    <tr class="h-30 border border-black bg-gray-300 min-h-full font-bold">
                        <td class="p-3 px-5 border border-black">Total Estimated FFB Yield (MT)</td>
                        <td class="p-3 px-5 border border-black" colspan="2"><?php echo $total; ?> MT</td>
                    </tr>
                    
            </tbody>
        </table>
    </div>
</div>

@endsection