<div class="m-3">
  <form action="{{route('save-erp-user')}}" method="post" id="hr-user-form">
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
            <input type="test" name="username" value="" class="form-control username" required>
            <div class="invalid-feedback username_err"> </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
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
        <div class="form-group row mt-3">
          <label class="col-md-3 col-lg-12">{{ __('User role')}} <span class="required">*</span></label>
          <div class="col-md-9 col-lg-12">
            <select class="form-control group_id" name="group_id" required>
              <option value=""></option>

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
            <div class="invalid-feedback pass_err"> </div>
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
        url: "{{ route('save-erp-user') }}",
        type: 'POST',
        dataType: 'json',
        data: data,
        success: function(data) {
          if (data.success == true) {
            HRSuccessMsg("{{ __('User Account added successfully')}}", '{{__("Success")}}');
            var myModalEl = document.getElementById('ajaxModal');
            var modal = bootstrap.Modal.getInstance(myModalEl)
            modal.hide();
          } else {
            printErrorMsg(data.errors);
            HRErrorMsg(data.message, '{{__("Error")}}');

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
  $(".group_id").select2({
    dropdownParent: $('#ajaxModal'),
    dir: "<?= app()->getLocale() == "ar" ? "rtl" : "ltr" ?>",
    language: "<?= app()->getLocale() == "ar" ? "ar" : "en" ?>",
    ajax: {
      url: '<?= route("erp-group-list") ?>',
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
</script>