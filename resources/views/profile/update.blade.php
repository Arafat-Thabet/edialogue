<x-app-layout>


  <section class="px-5 py-3 mt-2 bg-white">

    <div class="container">
      <form action="{{route('profile-update-info')}}" method="POST">
        {{ csrf_field() }}
        <div class="form-group row ">
          <label class="col-md-3 col-lg-2">{{ __('Name')}} <span class="required">*</span></label>
          <div class="col-md-9 col-lg-10">
            <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : ''}}" value="{{$user->name}}" required>
            {!! $errors->first('name', '<p class="invalid-feedback">:message</p>') !!}

          </div>
        </div>
        <div class="form-group row mt-3 ">
          <label class="col-md-3 col-lg-2">{{ __('Email')}} <span class="required">*</span></label>
          <div class="col-md-9 col-lg-10">
            <input type="email" name="email" value="{{$user->email}}" class="form-control {{ $errors->has('email') ? 'is-invalid' : ''}}" required>
            {!! $errors->first('email', '<p class="invalid-feedback">:message</p>') !!}

          </div>
        </div>

        <div class="form-group text-end row mt-3">
          <div class="col-md-12">
            <button type="submit" class="btn btn-primary">{{ __('Save')}}</button>
          </div>
        </div>
     
      </form>
      
    </div>
  </section>
  <section class="px-5 py-3  bg-white mt-3">

<div class="container">
  <form action="{{route('profile-update-password')}}" method="post">
    {{ csrf_field() }}
    <div class="form-group row ">
      <label class="col-md-3 col-lg-2">{{ __('Current Password')}} <span class="required">*</span></label>
      <div class="col-md-9 col-lg-10">
        <input type="password" name="current_password" class="form-control {{ $errors->has('current_password') ? 'is-invalid' : ''}}" value="" required>
        {!! $errors->first('current_password', '<p class="invalid-feedback">:message</p>') !!}

      </div>
    </div>
    <div class="form-group row mt-3 ">
      <label class="col-md-3 col-lg-2">{{ __('New Password')}} <span class="required">*</span></label>
      <div class="col-md-9 col-lg-10">
        <input type="password" name="new_password" value="" class="form-control {{ $errors->has('new_password') ? 'is-invalid' : ''}}" required>
        {!! $errors->first('new_password', '<p class="invalid-feedback">:message</p>') !!}

      </div>
    </div>
    <div class="form-group row mt-3 ">
      <label class="col-md-3 col-lg-2">{{ __('Confirm Password')}} <span class="required">*</span></label>
      <div class="col-md-9 col-lg-10">
        <input type="password" name="confirm_password" value="" class="form-control {{ $errors->has('confirm_password') ? 'is-invalid' : ''}}" required>
        {!! $errors->first('confirm_password', '<p class="invalid-feedback">:message</p>') !!}

      </div>
    </div>
    <div class="form-group text-end row mt-3">
      <div class="col-md-12">
        <button type="submit" class="btn btn-primary">{{ __('Save')}}</button>
      </div>
    </div>
 
  </form>
</div>
</section>
</x-app-layout>
<?=message_box('error')?>
<?=message_box('success')?>
