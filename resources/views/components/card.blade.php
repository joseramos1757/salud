@props(['cardTitle'=>'','cardTools'=>'','cardFooter'=>''])
<div class="bg-white rounded-lg shadow-lg">
    <div class="px-6 py-4 mt-4">
        <h3 class="text-lg font-semibold"><b>{{$cardTitle}}</b></h3>
        <div class="flex items-center mt-2">
            {{$cardTools}}
        </div>
    </div>
    <div class="p-6">
        {{$slot}}
    </div>
    <div class="bg-gray-100 px-6 py-4">
        <div class="text-right">
            {{$cardFooter}}
        </div>
    </div>
</div>
