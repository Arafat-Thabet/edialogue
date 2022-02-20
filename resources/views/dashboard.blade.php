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
                                <div class="block">
                                    <img src="{{asset('img/img3.png')}}">
                                    <div class="link-div relative">
                                        <a target="__blank" href="{{$smart_hr_url}}" class="btn dashboard-btn">    {{ __('Smart HR')}}</a>
                                        @if($user->hr_user_id<=0)
                                        
                                        <span class="btn mt-1 unlinked btn-danger">{{__('Unlinked')}}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-12">
                                <div class="block">
                                    <img src="{{asset('img/img4.png')}}">
                                    <div class="link-div relative">
                                        <a target="__blank" href="{{$task_url}}" class="btn dashboard-btn">{{ __('Task Managment')}}</a>
                                        @if($user->task_user_id<=0)
                                        
                                        <span class="btn mt-1 unlinked btn-danger">{{__('Unlinked')}}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-12">
                                <div class="block">
                                    <img src="{{asset('img/img1.png')}}">
                                    <div class="link-div relative">
                                        <a target="__blank" href="{{$erp_url}}" class="btn dashboard-btn">   {{ __('Smart ERP')}}</a>
                                        @if($user->erp_user_id<=0)
                                        
                                        <span class="btn mt-1 unlinked btn-danger">{{__('Unlinked')}}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-12">
                                <div class="block">
                                    <img src="{{asset('img/img2.png')}}">
                                    <div class="link-div relative">
                                        <a target="__blank" href="{{$ticket_url}}" class="btn dashboard-btn"> {{ __('Smart Tickets')}}</a>
                                        @if($user->ticket_user_id<=0)
                                        
                                        <span class="btn mt-1 unlinked btn-danger">{{__('Unlinked')}}</span>
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
