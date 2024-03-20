@props(['cardTitle'=>'','cardTools'=>'','cardFooter'=>''])
<div class="container mx-auto bg-white rounded-2xl shadow-lg ">
    <div class="flex items-center justify-between px-6 py-4 mt-4 -mb-8 ">
        <h3 class="text-3xl font-semibold"><b>{{$cardTitle}}</b></h3>
        <div class="flex items-center mt-2 ml-auto">
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