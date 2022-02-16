<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-12  flex justify-center text-center">
        <div class="bg-white rounded shadow border p-6 mx-4 w-1/4">
           <a target="__blank" href="{{$smart_hr_url}}" class="h4 font-bold mb-4 mt-0 flex-auto mx-4 w-1/4">
           {{ __('Smart HR')}}
           </a>
           
        </div>
        <div class="bg-white rounded shadow border p-6 mx-4 w-1/4">
            <a target="__blank" href="{{$ticket_url}}" class="h4 font-bold mb-4 mt-0 flex-auto mx-4 w-1/4">
           {{ __('Smart Tickets')}}
           </a>
        </div>
        <div class="bg-white rounded shadow border p-6 mx-4 w-1/4">
            <a target="__blank" href="{{$task_url}}" class="h4 font-bold mb-4 mt-0 flex-auto mx-4 w-1/4">
           {{ __('Task Managment')}}
           </a>
        </div>
        <div class="bg-white rounded shadow border p-6 mx-4 w-1/4">
            <a target="__blank" href="{{$erp_url}}" class="h4 font-bold mb-4 mt-0 flex-auto mx-4 w-1/4">
           {{ __('Smart ERP')}}
           </a>
        </div>
    </div>
   

</x-app-layout>
<script src="https://cdn.tailwindcss.com"></script>
