<div class="m-3">
  <form action="{{route('save_ticket_user')}}" method="post" id="hr-user-form">
    {{ csrf_field() }}
    <div class="row">
      <div class="col-lg-6">
    <div class="form-group row mt-1">
      <label class="col-md-3 col-lg-12">{{ __('First name')}} <span class="required">*</span></label>
      <div class="col-md-9 col-lg-12">
        <input type="text" name="first_name" class="form-control" value="" required>
        <div class="invalid-feedback first_name_err">
        </div>
      </div>
    </div>
    </div>
    <div class="col-lg-6">
    <div class="form-group row mt-1">
      <label class="col-md-3 col-lg-12">{{ __('Last name')}} <span class="required">*</span></label>
      <div class="col-md-9 col-lg-12">
        <input type="text" name="last_name" class="form-control last_name" value="" required>
        <div class="invalid-feedback last_name_err">
        </div>
      </div>
    </div>
    </div>
    </div>
    <div class="row">
      <div class="col-lg-6">
      <div class="form-group row mt-3 ">
      <label class="col-md-3 col-lg-12">{{ __('User Name')}} <span class="required">*</span></label>
      <div class="col-md-9 col-lg-12">
        <input type="test" name="name" value="" class="form-control username" required>
        <div class="invalid-feedback name_err"> </div>
      </div>
    </div>
    </div>
    <div class="form-group row mt-3 ">
      <label class="col-md-3 col-lg-12">{{ __('Email')}} <span class="required">*</span></label>
      <div class="col-md-9 col-lg-12">
        <input type="email" name="email" value="" class="form-control" required>
        <div class="invalid-feedback email_err"> </div>
      </div>
    </div>
    </div>
    </div>

    <div class="row">
      <div class="col-lg-6">
    <div class="form-group row mt-3 ">
      <label class="col-md-3 col-lg-12">{{ __('Gender')}} <span class="required">*</span></label>
      <div class="col-md-9 col-lg-12">
        <select name="gender" class="form-control" required>
          <option value=""></option>
          <option value="Male">{{__('Male')}}</option>
          <option value="Female">{{__('Female')}}</option>
        </select>
        <div class="invalid-feedback gender_err"> </div>
      </div>
    </div>
      </div>
      <div class="col-lg-6">
    <div class="form-group row mt-3 ">
      <label class="col-md-3 col-lg-12">{{ __('Direct Manager')}} <span class="required">*</span></label>
      <div class="col-md-9 col-lg-12">
        <select name="direct_manager_id" class="form-control direct-manager-id" required>
          <option value=""></option>

        </select>
        <div class="invalid-feedback gender_err"> </div>
      </div>
    </div>
    </div>
    </div>
    <div class="row">
      <div class="col-lg-6">
    <div class="form-group row mt-3 ">
      <label class="col-md-3 col-lg-12">{{ __('Branch')}} <span class="required">*</span></label>
      <div class="col-md-9 col-lg-12">
        <select name="branch_id" class="form-control emp-branch-id" required>
          <option value="-1"></option>

        </select>
        <div class="invalid-feedback branch_id_err"> </div>
      </div>
    </div>
      </div>
      <div class="col-lg-6">
    <div class="form-group row mt-3 ">
      <label class="col-md-3 col-lg-12">{{ __('Department')}} <span class="required">*</span></label>
      <div class="col-md-9 col-lg-12">
        <select name="dept_id" class="form-control emp-dept-id" required>
          <option value=""></option>

        </select>
        <div class="invalid-feedback dept_id_err"> </div>
      </div>
    </div>
    </div>


    
    <div class="row">
    <div class="col-lg-6">
    <div class="form-group row mt-3">
      <label class="col-md-3 col-lg-12">{{ __('User role')}} <span class="required">*</span></label>
      <div class="col-md-9 col-lg-12">
        <input type="text" name="group_id" class="form-control group_id" required>
        <select class="form-control group_id" name="group_id" required>
          <option value="1"></option>

        </select>
        <div class="invalid-feedback group_id_err"> </div>

      </div>
    </div>
    </div>
    <div class="col-lg-6">
    <div class="form-group row mt-3">
      <label class="col-md-3 col-lg-12">{{ __('Password')}} <span class="required">*</span></label>
      <div class="col-md-9 col-lg-12">
        <input type="password" name="pass" minlength="5" class="form-control" required>
        <div class="invalid-feedback password_err"> </div>
      </div>
    </div>
    </div>
    </div>
<div class="row">
<div class="col-lg-6">
    <div class="form-group row mt-3">
      <label class="col-md-3 col-lg-12">{{ __('HR User Role')}} <span class="required">*</span></label>
      <div class="col-md-9 col-lg-12">
        <select class="form-control hr-role-id" name="role_id" required>
          <option value=""></option>

        </select>
        <div class="invalid-feedback role_id_err"> </div>

      </div>
    </div>
    </div>
    <div class="col-lg-6">
    <div class="form-group row mt-3">
      <label class="col-md-3 col-lg-12">{{ __('Employee type')}} <span class="required">*</span></label>
      <div class="col-md-9 col-lg-12">
        <select class="form-control employee_type" name="employee_type" required>
          <option value="1">{{__('Essential')}}</option>
          <option value="2">{{__('Volunteer')}}</option>

        </select>
        <div class="invalid-feedback employee_type_err"> </div>

      </div>
    </div>
    </div>
    </div>
    <div class="modal-footer mt-2">
      <button type="button" class="btn btn-default" data-bs-target="#exampleModalToggle" data-bs-toggle="modal" data-bs-dismiss="modal">{{__('Close')}}</button>
      <button type="button" class="btn btn-primary btn-submit">{{ __('Save')}}</button>

    </div>
  </form>
</div>
<script type="text/javascript">
  $(document).ready(function() {
    var validatorAddNav = $("#hr-user-form").validate({
      rules: {
        formPage: {
          required: true,
          letterswithbasicpunc: true,
          rangelength: [3, 20]
        }
      },
      errorPlacement: function(error, element) {
        errorInsert = "#" + element.attr("name") + "Error";
        error.appendTo(errorInsert);
      },
      highlight: function(element) {
        $(element).addClass("is-invalid").removeClass("is-valid");
      },
      unhighlight: function(element) {
        $(element).addClass("is-valid").removeClass("is-invalid");
      }
    });
    $(".btn-submit").click(function(e) {
      e.preventDefault();

 
      var data = $("#hr-user-form").serialize();
      $.ajax({
        url: "{{ route('store-hr-employee') }}",
        type: 'POST',
        dataType: 'json',
        data: data,
        success: function(data) {
          if (data.success==true) {
            HRSuccessMsg(data.message,'{{__("Success")}}');
          } else {
            printErrorMsg(data.errors);
            HRErrorMsg(data.message,'{{__("Error")}}');

          }
        }
      });
    });

    function printErrorMsg(msg) {
      $.each(msg, function(key, value) {
        console.log(key);
        $('.' + key + '_err').text(value);
        $('.' + key + '_err').prev().addClass('is-invalid');

      });
    }
  });
</script>
<script>
  $(".direct-manager-id").select2({
    dropdownParent: $('#ajaxModal'),
    dir: "<?= app()->getLocale() == "ar" ? "rtl" : "ltr" ?>",
    language: "<?= app()->getLocale() == "ar" ? "ar" : "en" ?>",
    ajax: {
      url: '<?= route("managers-list") ?>',
      data: function(params) {
        var query = {
          search: params.term,
          type: 'data'
        }

        return query;
      },
      processResults: function(data) {
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
  $(".emp-branch-id").select2({
    dropdownParent: $('#ajaxModal'),
    dir: "<?= app()->getLocale() == "ar" ? "rtl" : "ltr" ?>",
    language: "<?= app()->getLocale() == "ar" ? "ar" : "en" ?>",
    ajax: {
      url: '<?= route("branche-list") ?>',
      data: function(params) {
        var query = {
          search: params.term,
          type: 'data'
        }

        return query;
      },
      processResults: function(data) {
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
  $(".emp-dept-id").select2({
    dropdownParent: $('#ajaxModal'),
    dir: "<?= sys_lang() == "ar" ? "rtl" : "ltr" ?>",
    language: "<?= sys_lang() == "ar" ? "ar" : "en" ?>",
    ajax: {
      url: '<?= route("departments-list") ?>',
      data: function(params) {
        var query = {
          search: params.term,
          type: 'data'
        }

        return query;
      },
      processResults: function(data) {
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
  $(".work_schedule_id").select2({
    dropdownParent: $('#ajaxModal'),
    dir: "<?= sys_lang() == "ar" ? "rtl" : "ltr" ?>",
    language: "<?= sys_lang() == "ar" ? "ar" : "en" ?>",
    ajax: {
      url: '<?= route("work-schedules-list") ?>',
      data: function(params) {
        var query = {
          search: params.term,
          type: 'data'
        }

        return query;
      },
      processResults: function(data) {
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
  $(".salary_currency").select2({
    dropdownParent: $('#ajaxModal'),
    dir: "<?= sys_lang() == "ar" ? "rtl" : "ltr" ?>",
    language: "<?= sys_lang() == "ar" ? "ar" : "en" ?>",
    ajax: {
      url: '<?= route("currencies-list") ?>',
      data: function(params) {
        var query = {
          search: params.term,
          type: 'data'
        }

        return query;
      },
      processResults: function(data) {
        var r_data = [];

        var count = data.length;

        for (i = 0; i < count; i++) {
          r_data[i] = {
            "id": data[i].code,
            "text": data[i].name
          }
        }

        return {
          results: r_data
        };
      }
    }

  });
  $(".hr-role-id").select2({
    dropdownParent: $('#ajaxModal'),
    dir: "<?= sys_lang() == "ar" ? "rtl" : "ltr" ?>",
    language: "<?= sys_lang() == "ar" ? "ar" : "en" ?>",
    ajax: {
      url: '<?= route("hr-roles-list") ?>',
      data: function(params) {
        var query = {
          search: params.term,
          type: 'data'
        }

        return query;
      },
      processResults: function(data) {
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
  
  var calendar = $.calendars.instance();

  //   $.calendars.instance('gregorian','ar');
  $('.date-picker').calendarsPicker({
    calendar: calendar,
    dateFormat: "yyyy-mm-dd",

  });

</script>