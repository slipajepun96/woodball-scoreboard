@extends('layout.master')

@section('content')
<div class="m-3 bg-white w-auto rounded-xl p-3">
    <p class="text-2xl font-bold">Daily FFB Output for May 2022</p>
    {{-- <p class="italic text-gray-700">Last Updates: 18 January 2022</p> --}}
    {{-- <p>~Table here~</p> --}}

    <div class="m-2 overflow-x-auto">
        <table class="border-collapse border border-green-900 w-full">
            <thead>
                <tr class="bg-gray-200 p-3 font-bold">
                    <td width="3%" class="border border-blue-900 p-3 display-none" rowspan="3">Date</td>
                    <?php $i=0; ?>
                    @foreach($data_array[2] as $estate)
                        <td width="" class="border border-blue-900 p-1" colspan="3">{{$estate->estate_name}}</td>
                        <?php 
                        $estate_numbering[$i]=$estate->id;
                        $i=$i+1;
                        ?>
                    @endforeach
                   
                    <td width="" class="border border-blue-900 p-3" colspan="3">Total</td>
                </tr>
                <tr class="bg-gray-200 p-3">
                    @for($i=0;$i<=$data_array[3];$i++)
                        <td width="" class="border border-blue-900 p-1" colspan="2">Actual</td>
                        <td width="" class="border border-blue-900 p-1" colspan="1">Budget</td>
                    @endfor
                </tr>
                <tr class="bg-gray-200 p-3">
                    @for($i=0;$i<=$data_array[3];$i++)
                        <td width="" class="border border-blue-900 p-1">Today</td>
                        <td width="" class="border border-blue-900 p-1">Todate</td>
                        <td width="" class="border border-blue-900 p-1">Todate</td>
                    @endfor
                </tr>
            </thead>
            <tbody>
                @if($ffbyields->count()==0)
                    <tr>
                        <td colspan=5>Empty List <br>(contact administrator if you think this is an error)</td>
                    </tr>
                @else
                <?php 
                    $number_of_days=cal_days_in_month(CAL_GREGORIAN,$data_array[1],$data_array[0]);
                    $month_data_var=$data_array[5];
                    $cumulative_ffb_mt[]=0;
                ?>
                @for($j=1;$j<=$number_of_days;$j++)
                    <tr class="h-30 border border-black hover:bg-cyan-50 text-center min-h-full">
                        <td class="border border-gray-300 p-1 px-3"><?php echo $j;?></td>
                        @for($k=0;$k<$data_array[3];$k++)
                            <?php $hit=0; ?>
                            @foreach($ffbyields as $ffbyield)
                            <?php 
                                
                                $date=DateTime::createFromFormat("Y-m-d",$ffbyield->date);
                                $day=$date->format("d");
                                // dd($day==$j&&$ffbyield->estate_id==$estate_numbering[$k]&&$k<$data_array[3]);
                            ?>
                                @if($j==$day&&$ffbyield->estate_id==$estate_numbering[$k])
                                <?php $ffb_mt=$ffbyield->ffb_mt;
                                $daily_budget=$data_array[4][$k]->$month_data_var/$number_of_days;
                                $percentage=0;
                                $percentage=$ffb_mt/$daily_budget*100;
                                ?>
                                @if($percentage>=0&&$percentage<80)
                                    <td class="border border-gray-300 p-1 bg-red-600 text-white">{{$ffbyield->ffb_mt}}</td>
                                @elseif($percentage>=80&&$percentage<100)
                                    <td class="border border-gray-300 p-1 bg-yellow-300 ">{{$ffbyield->ffb_mt}}</td>
                                @else
                                    <td class="border border-gray-300 p-1 bg-green-700 text-white">{{$ffbyield->ffb_mt}}</td>
                                @endif

                                <?php
                                $l=$ffbyield->estate_id-1;
                                if($j==1)
                                {
                                    // echo($ffbyield->estate_id);
                                    
                                    $cumulative_ffb_mt[$l]=2;
                                    // dd($cumulative_ffb_mt[$k]);
                                    $cumulative_ffb_mt[$l]=$ffb_mt;
                                    // dd($cumulative_ffb_mt);
                                    // echo("$ffbyield->estate_id");
                                }
                                else
                                echo($ffbyield->estate_id);
                                    // $cumulative_ffb_mt[$ffbyield->estate_id]=$cumulative_ffb_mt[$ffbyield->estate_id]+$ffb_mt;
                                ?>
                                <?php
                                // dd($cumulative_ffb_mt[$l]);
                                ?>
                                <td class="border border-gray-300 p-1"><?php echo($cumulative_ffb_mt[$l]);?></td>
                                <td class="border border-gray-300 p-1"><?php echo round($daily_budget*$j,2);?></td>
                                <?php $hit=$hit+1; ?>
                                @endif
                            @endforeach
                            @if($hit==0)
                                <td class="border border-gray-300 p-1">0</td>
                                <td class="border border-gray-300 p-1">0</td>
                                <?php $daily_budget=$data_array[4][$k]->$month_data_var/$number_of_days*$j; ?>
                                <td class="border border-gray-300 p-1"><?php echo round($daily_budget,2);?></td>
                            @endif
                        @endfor
                        
                        <td class="border border-gray-300 p-1">3</td>
                        <td class="border border-gray-300 p-1">3</td>
                        <td class="border border-gray-300 p-1">3</td>
                    </tr>
                    {{-- @endfor --}}
                    @endfor
                @endif

            </tbody>
        </table>
 
        
    </div>
</div>
@endsection