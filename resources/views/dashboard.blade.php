<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-12  flex justify-center">
        <div class="bg-white rounded shadow border p-6 mx-4 w-1/4">
           <a href="{{$smart_hr_url}}" class="text-3xl font-bold mb-4 mt-0 flex-auto mx-4 w-1/4">
           {{ __('Smart HR')}}
           </a>
           
        </div>
        <div class="bg-white rounded shadow border p-6 mx-4 w-1/4">
            <a href="{{$ticket_url}}" class="text-3xl font-bold mb-4 mt-0 flex-auto mx-4 w-1/4">
           {{ __('Smart Tickets')}}
           </a>
        </div>
        <div class="bg-white rounded shadow border p-6 mx-4 w-1/4">
            <h5 class="text-3xl font-bold mb-4 mt-0">{{ __('Task Managment ')}}</h5>
        </div>
        <div class="bg-white rounded shadow border p-6 mx-4 w-1/4">
            <h5 class="text-3xl font-bold mb-4 mt-0">{{ __('Smart ERP ')}} </h5>
        </div>
    </div>
   

</x-app-layout>
<script src="https://cdn.tailwindcss.com"></script>
