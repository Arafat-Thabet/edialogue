<x-app-layout>
<div class="flex  justify-center bg-gray-100">
<div class="col-lg-9">
  <section class="px-5 py-3 content bg-white">
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
          <div class="col-md-9 col-lg-10">
            <input type="text" name="name" value="{{$user->name}}" class="form-control {{ $errors->has('name') ? 'is-invalid' : ''}}" value="{{old('name')}}" required>
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

        <div class="form-group row mt-3">
          <label class="col-md-3 col-lg-2">{{ __('HR user')}}</label>
          <div class="col-md-9 col-lg-10">
            <select class="form-control emp-select2" name="hr_user_id">
              <option value="0"></option>
              @foreach($hr_users as $u)
              <option value="{{$u->id}}" {{$u->id==$user->hr_user_id ? 'selected' : ''}}>{{$u->name}}</option>
              @endforeach
            </select>
            <?= modal_anchor(route('add-hr-employee'), __('Add'), array('class' => 'btn btn-sm btn-primary', "title" => __('Add'), 'data-modal-xl' => "1")) ?>

          </div>
        </div>
        <div class="form-group row mt-3">
          <label class="col-md-3 col-lg-2">{{ __('Ticket User')}}</label>
          <div class="col-md-9 col-lg-10">
            <select class="form-control ticket-select2" name="ticket_user_id">
              <option value="0"></option>
              @foreach($ticket_users as $u)
              <option value="{{$u->id}}" {{$u->id==$user->ticket_user_id ? 'selected' : ''}}>{{$u->name}}</option>
              @endforeach
            </select>
            <?= modal_anchor(route('add-ticket-user'), __('Add'), array('class' => 'btn btn-sm btn-primary', "title" => __('Add'), 'data-modal-xl' => "1")) ?>

          </div>
        </div>
        <div class="form-group row mt-3">
          <label class="col-md-3 col-lg-2">{{ __('Task Managment User')}}</label>
          <div class="col-md-9 col-lg-10">
            <select class="form-control task-select2" name="task_user_id">
              <option value="0"></option>
              @foreach($task_users as $u)
              <option value="{{$u->id}}" {{$u->id==$user->task_user_id ? 'selected' : ''}}>{{$u->name}}</option>
              @endforeach
            </select>
            <?= modal_anchor(route('add-task-user'), __('Add'), array('class' => 'btn btn-sm btn-primary', "title" => __('Add'), 'data-modal-xl' => "1")) ?>

          </div>
        </div>
        <div class="form-group row mt-3">
          <label class="col-md-3 col-lg-2">{{ __('ERP User')}}</label>
          <div class="col-md-9 col-lg-10">
            <select class="form-control erp-select2" name="erp_user_id">
            <option value="0"></option>
              @foreach($erp_users as $u)
              <option value="{{$u->id}}" {{$u->id==$user->erp_user_id ? 'selected' : ''}}>{{$u->name}}</option>
              @endforeach
            </select>
            <?=modal_anchor(route('add-erp-user'),__('Add'),array('class'=>'btn btn-sm btn-primary',"title"=>__('Add'),'data-modal-xl'=>"1"))?>

          </div>
        </div>
        <div class="form-group row mt-3">
          <label class="col-md-3 col-lg-2">{{ __('User role')}} <span class="required">*</span></label>
          <div class="col-md-9 col-lg-10">
            <select class="form-control {{ $errors->has('role_id') ? 'is-invalid' : ''}}" name="role_id" required>
              <option value=""></option>

              <option value="1" {{$user->role_id==1 ? 'selected' :''}}>{{ __('Admin')}}</option>
              <option value="2" {{$user->role_id==2 ? 'selected' :''}}>{{ __('Normal User')}}</option>
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
  </div>
  </div>
</x-app-layout>
<script>
  $(document).ready(function() {
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
    $(".task-select2").select2({
      dir: "<?= sys_lang() == "ar" ? "rtl" : "ltr" ?>",
      language: "<?= sys_lang() == "ar" ? "ar" : "en" ?>",
      ajax: {
        url: '<?= route("task-users-list") ?>',
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
    $(".erp-select2").select2({
    dir: "<?= sys_lang() == "ar" ? "rtl" : "ltr" ?>",
    language: "<?= sys_lang() == "ar" ? "ar" : "en" ?>",
    ajax: {
      url: '<?= route("erp-user-list") ?>',
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