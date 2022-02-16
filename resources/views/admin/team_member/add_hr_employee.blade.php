<div class="m-3">
  <form action="{{route('save_member')}}" method="post" id="hr-user-form">
    {{ csrf_field() }}
    <div class="row">
      <div class="col-lg-6">
    <div class="form-group row mt-1">
      <label class="col-md-3 col-lg-12">{{ __('Full Name Arabic')}} <span class="required">*</span></label>
      <div class="col-md-9 col-lg-12">
        <input type="text" name="full_name_ar" class="form-control" value="{{old('name')}}" required>
        <div class="invalid-feedback full_name_ar_err">
        </div>
      </div>
    </div>
    </div>
    <div class="col-lg-6">
    <div class="form-group row mt-1">
      <label class="col-md-3 col-lg-12">{{ __('Full Name English')}} <span class="required">*</span></label>
      <div class="col-md-9 col-lg-12">
        <input type="text" name="full_name_en" class="form-control" value="{{old('name')}}" required>
        <div class="invalid-feedback full_name_en_err">
        </div>
      </div>
    </div>
    </div>
    </div>
    <div class="row">
      <div class="col-lg-6">
    <div class="form-group row mt-3 ">
      <label class="col-md-3 col-lg-12">{{ __('Email')}} <span class="required">*</span></label>
      <div class="col-md-9 col-lg-12">
        <input type="email" name="email" value="" class="form-control" required>
        <div class="invalid-feedback email_err"> </div>
      </div>
    </div>
    </div>
    <div class="col-lg-6">
    <div class="form-group row mt-3">
      <label class="col-md-3 col-lg-12">{{ __('Birth date')}} <span class="required">*</span></label>
      <div class="col-md-9 col-lg-12">
        <input type="text" name="date_of_birth" class="form-control date-picker" value="" required>
        <div class="invalid-feedback date_of_birth_err">
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
      <label class="col-md-3 col-lg-12">{{ __('Hire date')}} <span class="required">*</span></label>
      <div class="col-md-9 col-lg-12">
        <input type="text" name="joining_date" class="form-control date-picker" value="" required>
        <div class="invalid-feedback joining_date_err">
        </div>
      </div>
    </div>
    </div>
    <div class="col-lg-6">
    <div class="form-group row mt-3 ">
      <label class="col-md-3 col-lg-12">{{ __('Annual vacation balance')}} <span class="required">*</span></label>
      <div class="col-md-9 col-lg-12">
        <input type="number" name="holiday_no" class="form-control" value="" required>

        <div class="invalid-feedback holiday_no_err"> </div>
      </div>
    </div>
    </div>
 
    </div>
    <div class="row">
    <div class="col-lg-6">
    <div class="form-group row mt-3 ">
      <label class="col-md-3 col-lg-12">{{ __('Job time type')}} <span class="required">*</span></label>
      <div class="col-md-9 col-lg-12">
        <select name="job_time" class="form-control select2" required>
        <option value=""></option>
          <option value="Full">{{__('Full')}}</option>
          <option value="Part">{{__('Part')}}</option>

        </select>
        <div class="invalid-feedback job_time_err"> </div>
      </div>
    </div>
    </div>
    <div class="col-lg-6">
    <div class="form-group row mt-3 ">
      <label class="col-md-3 col-lg-12">{{ __('Work schedule')}} <span class="required">*</span></label>
      <div class="col-md-9 col-lg-12">
        <select name="work_schedule_id" class="form-control work_schedule_id" required>
          <option value=""></option>

        </select>
        <div class="invalid-feedback work_schedule_id_err"> </div>
      </div>
    </div>
    </div>
    </div>
    <div class="row">

    <div class="col-lg-6">
    <div class="form-group row mt-3 ">
      <label class="col-md-3 col-lg-12">{{ __('Base Salary')}} <span class="required">*</span></label>
      <div class="col-md-9 col-lg-12">
        <input type="number" name="employee_salary" class="form-control" value="" required>

        <div class="invalid-feedback employee_salary_err"> </div>
      </div>
    </div>
    </div>
    
    <div class="col-lg-6">
    <div class="form-group row mt-3 ">
      <label class="col-md-3 col-lg-12">{{ __('Currency')}} <span class="required">*</span></label>
      <div class="col-md-9 col-lg-12">
        <select name="salary_currency" class="form-control salary_currency" required>
          <option value=""></option>

        </select>
        <div class="invalid-feedback salary_currency_err"> </div>
      </div>
    </div>
    </div>
    </div>
    
    <div class="row">
    <div class="col-lg-6">
    <div class="form-group row mt-3">
      <label class="col-md-3 col-lg-12">{{ __('Employee job No')}} <span class="required">*</span></label>
      <div class="col-md-9 col-lg-12">
        <input type="text" name="emp_job_number" class="form-control" required>
        <div class="invalid-feedback emp_job_number_err"> </div>

      </div>
    </div>
    </div>
    <div class="col-lg-6">
    <div class="form-group row mt-3">
      <label class="col-md-3 col-lg-12">{{ __('Password')}} <span class="required">*</span></label>
      <div class="col-md-9 col-lg-12">
        <input type="password" name="password" class="form-control" required>
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
            var myModalEl = document.getElementById('ajaxModal');
var modal = bootstrap.Modal.getInstance(myModalEl)
modal.hide();
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