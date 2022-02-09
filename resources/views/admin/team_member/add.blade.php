<x-app-layout>
<section class="p-5 content bg-white">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{url('')}}">{{ __('Dashboard')}}</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{ __('Add new member')}}</li>
  </ol>
</nav>
   <div class="container">
<form>
  <div class="form-group row">
    <label class="col-md-3 col-lg-2">{{ __('Name')}}</label>
    <div class="col-md-9 col-lg-10">
    <input type="text" class="form-control" required>
  </div>
  </div>
  <div class="form-group row mt-3">
    <label class="col-md-3 col-lg-2">{{ __('Email')}}</label>
    <div class="col-md-9 col-lg-10">
    <input type="email" class="form-control" required>
  </div>
  </div>
  <div class="form-group row mt-3">
    <label class="col-md-3 col-lg-2">{{ __('Password')}}</label>
    <div class="col-md-9 col-lg-10">
    <input type="password" class="form-control" required>
  </div>
  </div>

<div class="form-group text-end row mt-3">
<div class="col-md-12">
  <button type="submit" class="btn btn-primary">Submit</button>
  </div>
  </div>
  
</form>
</div>
</section>
</x-app-layout>
<script>
$(".advance_erp_account").select2({
            dir: "<?= app()->getLocale() == "ar" ? "rtl" : "ltr" ?>",
            language: "<?= app()->getLocale() == "ar" ? "ar" : "en" ?>",
            ajax: {
                url: '<?= url("synchronize_payroll/admin/get_erp_emp_accounts") ?>',
                data: function(params) {
                    var query = {
                        q: params.term,
                        type: 'advance_accounts'
                    }

                    return query;
                },
                processResults: function(data) {
                    // Transforms the top-level key of the response object from 'items' to 'results'
                    var r_data = [];
                    var count = data.advance_accounts.length;
                    for (i = 0; i < count; i++) {
                        r_data[i] = {
                            "id": data.advance_accounts[i].id,
                            "text": data.advance_accounts[i].name
                        }
                    }

                    return {
                        results: r_data
                    };
                }
            }

        });
        </script>