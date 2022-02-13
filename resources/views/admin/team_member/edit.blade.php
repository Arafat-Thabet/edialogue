<x-app-layout>
  <section class="p-5 content bg-white">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('')}}">{{ __('Dashboard')}}</a></li>
        <li class="breadcrumb-item"><a href="{{route('members_list')}}">{{ __('Members List')}}</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ __('Edit')}}</li>
      </ol>
    </nav>
    <div class="container">
      <form action="{{route('update_member')}}" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="id" value="{{$user->id}}" />
        <div class="form-group row ">
          <label class="col-md-3 col-lg-2">{{ __('Name')}} <span class="required">*</span></label>
          <div class="col-md-9 col-lg-7">
            <input type="text" name="name" value="{{$user->name}}" class="form-control {{ $errors->has('name') ? 'is-invalid' : ''}}" value="{{old('name')}}" required>
            {!! $errors->first('name', '<p class="invalid-feedback">:message</p>') !!}

          </div>
        </div>
        <div class="form-group row mt-3 ">
          <label class="col-md-3 col-lg-2">{{ __('Email')}} <span class="required">*</span></label>
          <div class="col-md-9 col-lg-7">
            <input type="email" name="email" value="{{$user->email}}" class="form-control {{ $errors->has('email') ? 'is-invalid' : ''}}" required>
            {!! $errors->first('email', '<p class="invalid-feedback">:message</p>') !!}

          </div>
        </div>
      
        <div class="form-group row mt-3">
          <label class="col-md-3 col-lg-2">{{ __('HR user')}}</label>
          <div class="col-md-9 col-lg-7">
            <select class="form-control emp-select2" name="hr_user_id">
              <option value="0"></option>
              @foreach($hr_users as $u)
              <option value="{{$u->id}}" {{$u->id==$user->hr_user_id ? 'selected' : ''}}>{{$u->name}}</option>
            @endforeach
            </select>
          </div>
        </div>
        <div class="form-group row mt-3">
          <label class="col-md-3 col-lg-2">{{ __('Ticket User')}}</label>
          <div class="col-md-9 col-lg-7">
            <select class="form-control ticket-select2" name="ticket_user_id">
              <option value="0"></option>
            </select>
          </div>
        </div>
        <div class="form-group row mt-3">
          <label class="col-md-3 col-lg-2">{{ __('User role')}} <span class="required">*</span></label>
          <div class="col-md-9 col-lg-7">
            <select class="form-control {{ $errors->has('role_id') ? 'is-invalid' : ''}}" name="role_id" required>
              <option value=""></option>

              <option value="1" {{$user->role_id==1 ? 'selected' :''}}>{{ __('Admin')}}</option>
              <option value="2" {{$user->role_id==2 ? 'selected' :''}}>{{ __('Normal User')}}</option>
            </select>
            {!! $errors->first('role_id', '<p class="invalid-feedback">:message</p>') !!}

          </div>
        </div>
        <div class="form-group text-end row mt-3">
          <div class="col-md-12 col-lg-9">
            <button type="submit" class="btn btn-primary">{{ __('Save')}}</button>
          </div>
        </div>

      </form>
    </div>
  </section>
</x-app-layout>
<script>
  $(document).ready(function(){
  $(".emp-select2").select2({
    dir: "<?= app()->getLocale() == "ar" ? "rtl" : "ltr" ?>",
    language: "<?= app()->getLocale() == "ar" ? "ar" : "en" ?>",
    ajax: {
      url: '<?= url("admin/hr-employees") ?>',
      data: function(params) {
        var query = {
          search: params.term,
          type: 'data'
        }

        return query;
      },
      processResults: function(data) {
        // Transforms the top-level key of the response object from 'items' to 'results'
        var r_data = [];

        var count = data.length;

        for (i = 0; i < count; i++) {
          r_data[i] = {
            "id": data[i].id,
            "text": data[i].name
          }
        }

        return {
          results: r_data
        };
      }
    }

  });
  $(".ticket-select2").select2({
    dir: "<?= app()->getLocale() == "ar" ? "rtl" : "ltr" ?>",
    language: "<?= app()->getLocale() == "ar" ? "ar" : "en" ?>",
    ajax: {
      url: '<?= url("admin/ticket-users") ?>',
      data: function(params) {
        var query = {
          search: params.term,
          type: 'data'
        }

        return query;
      },
      processResults: function(data) {
        // Transforms the top-level key of the response object from 'items' to 'results'
        var r_data = [];

        var count = data.length;

        for (i = 0; i < count; i++) {
          r_data[i] = {
            "id": data[i].id,
            "text": data[i].name
          }
        }

        return {
          results: r_data
        };
      }
    }

  });
});
</script>