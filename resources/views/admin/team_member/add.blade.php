<x-app-layout>
  <section class="p-5 content bg-white">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('')}}">{{ __('Dashboard')}}</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ __('Add new member')}}</li>
      </ol>
    </nav>
    <div class="container">
      <form action="{{route('save_member')}}" method="post">
        {{ csrf_field() }}
        <div class="form-group row ">
          <label class="col-md-3 col-lg-2">{{ __('Name')}} <span class="required">*</span></label>
          <div class="col-md-9 col-lg-10">
            <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : ''}}" value="{{old('name')}}" required>
            {!! $errors->first('name', '<p class="invalid-feedback">:message</p>') !!}

          </div>
        </div>
        <div class="form-group row mt-3 ">
          <label class="col-md-3 col-lg-2">{{ __('Email')}} <span class="required">*</span></label>
          <div class="col-md-9 col-lg-10">
            <input type="email" name="email" value="{{old('email')}}" class="form-control {{ $errors->has('email') ? 'is-invalid' : ''}}" required>
            {!! $errors->first('email', '<p class="invalid-feedback">:message</p>') !!}

          </div>
        </div>
        <div class="form-group row mt-3">
          <label class="col-md-3 col-lg-2">{{ __('Password')}} <span class="required">*</span></label>
          <div class="col-md-9 col-lg-10">
            <input type="password" name="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : ''}}" required>
            {!! $errors->first('password', '<p class="invalid-feedback">:message</p>') !!}

          </div>
        </div>
        <div class="form-group row mt-3">
          <label class="col-md-3 col-lg-2">{{ __('HR User')}}</label>
          <div class="col-md-9 col-lg-10">
            <select class="form-control emp-select2" name="hr_user_id">
              <option value="0"></option>
            </select>
          </div>
        </div>
        <div class="form-group row mt-3">
          <label class="col-md-3 col-lg-2">{{ __('User Role')}} <span class="required">*</span></label>
          <div class="col-md-9 col-lg-10">
            <select class="form-control {{ $errors->has('role_id') ? 'is-invalid' : ''}}" name="role_id" required>
              <option value=""></option>

              <option value="1" {{old('role_id')==1 ? 'selected' :''}}>{{ __('Admin')}}</option>
              <option value="2" {{old('role_id')==2 ? 'selected' :''}}>{{ __('Normal User')}}</option>
            </select>
            {!! $errors->first('role_id', '<p class="invalid-feedback">:message</p>') !!}

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
<script>
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
</script>