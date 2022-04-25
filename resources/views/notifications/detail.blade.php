<x-app-layout>
    <style>
        p {
            text-align: start;
        }
    </style>
<div class="container">
<nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('')}}">{{ __('Dashboard')}}</a></li>
        <li class="breadcrumb-item"><a href="{{route('notifications-list')}}">{{ __('Notifications')}}</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{$notice->title}}</li>
      </ol>
    </nav>
<section class="card mx-5">
<div class="card-body">
<h5 class="mx-2">{{$notice->title}}</h5>
    <h6 class="mx-2 my-1">{{__('Sender')}} : {{$user->name}}</h6>
    
    <h6 class="mx-2 my-1">{{__('Email')}} : {{$user->email}}</h6>
    <h6 class="mx-2 my-1">{{__('Created at')}} : <bdi>{{$notice->created_at}}</bdi></h6>
    @if($notice->event=='active_hr' && $check_id<=0)
    <p class="text-start">
        {{__('This user is not add in System')}}
        {{ __('Smart HR')}}
        <?=modal_anchor(route('add-hr-employee'),__('Add').' <i class="fa fa-plus"></i>',array('class'=>'btn btn-sm btn-primary ' ,"title"=>__('Add'),'data-modal-xl'=>"1"))?>

    </p>
    @endif
    @if($notice->event=='active_hr' && $user->hr_user_id<=0)
    {{__('This user is not active in System')}}
        {{ __('Smart HR')}}
        <a href="{{route('set-active-system',['user_id'=>$user->id,'type'=>'hr'])}}" class="btn mt-1 btn-sm btn-primary">{{__('Active System')}}</a>
    @endif
    @if($notice->event=='active_ticket' && $check_id<=0)
    <p>
        {{__('This user is not add in System')}}
        {{ __('Smart Tickets')}}
        <?=modal_anchor(route('add-ticket-user'),__('Add').' <i class="fa fa-plus"></i>',array('class'=>'btn btn-sm btn-primary ',"title"=>__('Add'),'data-modal-xl'=>"1"))?>
    </p>
    @endif
    @if($notice->event=='active_ticket' && $user->ticket_user_id<=0)
    {{__('This user is not active in System')}}
        {{ __('Smart Tickets')}}
        <a href="{{route('set-active-system',['user_id'=>$user->id,'type'=>'ticket'])}}" class="btn mt-1 btn-sm btn-primary">{{__('Active System')}}</a>
    @endif

    @if($notice->event=='active_erp' && $check_id<=0)
    <p>
        {{__('This user is not add in System')}}
        {{ __('Smart ERP')}}
        <?=modal_anchor(route('add-erp-user'),__('Add').' '.' <i class="fa fa-plus"></i>',array('class'=>'btn btn-sm  btn-primary ',"title"=>__('Add'),'data-modal-xl'=>"1"))?>
    </p>
    @endif
    @if($notice->event=='active_erp' && $user->erp_user_id<=0)
    {{__('This user is not active in System')}}
        {{ __('Smart ERP')}}
        <a href="{{route('set-active-system',['user_id'=>$user->id,'type'=>'erp'])}}" class="btn mt-1 btn-sm btn-primary">{{__('Active System')}}</a>
    @endif

    @if($notice->event=='active_task' && $check_id<=0)
    <p>
        {{__('This user is not add in System')}}
        {{ __('Task Managment')}}
        <?=modal_anchor(route('add-task-user'),__('Add').' '.' <i class="fa fa-plus"></i>',array('class'=>'btn btn-sm btn-primary ',"title"=>__('Add'),'data-modal-xl'=>"1"))?>
    </p>
    @endif
    @if($notice->event=='active_task' && $user->task_user_id<=0)
    {{__('This user is not active in System')}}
        {{ __('Task Managment')}}
        <a href="{{route('set-active-system',['user_id'=>$user->id,'type'=>'task'])}}" class="btn mt-1 btn-sm btn-primary">{{__('Active System')}}</a>
    @endif
</section>
</div>
</x-app-layout>