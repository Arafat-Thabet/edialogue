
<x-app-layout>
    <div class="main-content">
        <div class="container-fluid">
            <div class="main-title">
                <h4>{{__('The unified portal for the Edialogue')}}</h4>
            </div>
            <div class="row">

                <div class="col-lg-11 offset-lg-1 col-md-11 offset-md-1 col-sm-12 col-12">
                    <div class="row">

                        <div class="col-md-6 col-sm-12 col-12">
                            <div class="block bg-light">
                                <img src="{{asset('img/smart-hr.png')}}">
                                <div class="link-div relative">
                                @if($hr_user_id<=0 OR $user->hr_user_id<=0) 
                                <a href="{{route('active-system',['sys_type'=>'hr'])}}" class="btn mt-1 btn-md access-request-btn  btn-success px-1">{{__('Access request')}}</a>
                                @endif
                                    <a target="__blank" href="{{$smart_hr_url}}" class="btn dashboard-btn"> {{ __('Smart HR')}}</a>
                                    @if($hr_user_id<=0 OR $user->hr_user_id<=0) 
                                    <span class="btn mt-1 unlinked btn-danger">{{__('Unlinked')}}</span>
                                            @endif
                                </div>
                            </div>
                        </div>


                        <div class="col-md-6 col-sm-12 col-12">
                            <div class="block bg-light">
                                <img src="{{asset('img/task-system.png')}}">
                                <div class="link-div relative">
                                @if($task_user_id<=0 OR $user->task_user_id<=0) 
                                <a href="{{route('active-system',['sys_type'=>'task'])}}" class="btn mt-1 btn-md access-request-btn  btn-success">{{__('Access request')}}</a>
                                @endif
                                    <a target="__blank" href="{{$task_url}}" class="btn dashboard-btn">{{ __('Task Managment')}}</a>
                                    @if($task_user_id<=0 OR $user->task_user_id<=0) 
                                    <span class="btn mt-1 unlinked btn-danger">{{__('Unlinked')}}</span>
                                            @endif
                                </div>
                            </div>
                        </div>


                        <div class="col-md-6 col-sm-12 col-12">
                            <div class="block bg-light">
                                <img src="{{asset('img/smart-erp.png')}}">
                                <div class="link-div relative">
                                @if($erp_user_id<=0 OR $user->erp_user_id<=0)
                                <a href="{{route('active-system',['sys_type'=>'erp'])}}" class="btn mt-1 btn-md access-request-btn  btn-success">{{__('Access request')}}</a>
                                @endif
                                    <a target="__blank" href="{{$erp_url}}" class="btn dashboard-btn"> {{ __('Smart ERP')}}</a>
                                    @if($erp_user_id<=0 OR $user->erp_user_id<=0) <span class="btn mt-1 unlinked btn-danger">{{__('Unlinked')}}</span>
                                            @endif
                                </div>
                            </div>
                        </div>


                        <div class="col-md-6 col-sm-12 col-12">
                            <div class="block bg-light">
                                <img src="{{asset('img/ticket-system.png')}}">
                                <div class="link-div relative">
                                @if($ticket_user_id<=0 OR $user->ticket_user_id<=0)
                                <a href="{{route('active-system',['sys_type'=>'ticket'])}}" class="btn mt-1 btn-md access-request-btn  btn-success">{{__('Access request')}}</a>
                                @endif
                                    <a target="__blank" href="{{$ticket_url}}" class="btn dashboard-btn"> {{ __('Smart Tickets')}}</a>
                                    @if($ticket_user_id<=0 OR $user->ticket_user_id<=0) <span class="btn mt-1 unlinked btn-danger">{{__('Unlinked')}}</span>
                                            @endif
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
<script src="https://cdn.tailwindcss.com"></script>
<?=message_box('error')?>
<?=message_box('success')?>