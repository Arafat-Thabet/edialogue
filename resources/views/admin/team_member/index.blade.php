
<x-app-layout>
<script srsc="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.all.min.js"></script>
<div class="flex  justify-center bg-gray-100">
<div class="col-lg-12">
  <section class="p-5 content bg-white">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('')}}">{{ __('Dashboard')}}</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ __('Members List')}}</li>
      </ol>
    </nav>
    <div class="container">
        <div class="table-responsive">
    <table class="table table-borderd" id="users-table">
<thead>
    <th>{{__('Name')}}</th>
    <th>{{__('Email')}}</th>
    <th>{{ __('Smart HR')}}</th>
    <th> {{ __('Task Managment')}}</th>
    <th> {{ __('Smart ERP')}}</th>
    <th> {{ __('Smart Tickets')}}</th>
    <th> {{ __('Admin')}}</th>
    <th>{{__('Action')}}</th>
</thead>
<tbody class="text-center">

</tbody>
    </table>
    </div>
    </div>
  </section>
  </div>
  </div>
</x-app-layout>
<script>
    $(function() {
        $('#users-table').DataTable({
            processing: true,
            serverSide: true,
            "oLanguage": {
            "sProcessing": " جاري التحميل",
            "sLengthMenu": "عرض  _MENU_ من السجلات",
            "sZeroRecords": "لم يعثر على أية سجلات",
            "sInfo": "إظهار _START_ إلى _END_ من أصل _TOTAL_ مدخل",
            "sInfoEmpty":" يعرض 0 إلى 0 من أصل 0 سجل",
            "sInfoFiltered": "(منتقاة من مجموع _MAX_ مُدخل)",
         
            "sSearch": "بحث",
        
            "oPaginate": {
                "sFirst": "الأول",
                "sPrevious":" السابق",
                "sNext":" التالي",
                "sLast": "الأخير"
            }
        },
            ajax: "{{route('members')}}",
            aoColumns: [
      
       
        { mData: 'name' },
        { mData: 'email' },
        { mData: 'hr' },
        { mData: 'task' },
        { mData: 'erp' },
        { mData: 'ticket' },
        { mData: 'role' },
        { mData: 'action' },
        
  
 
    ],
});
    });
</script>
<script>

        $("body").on('click','.delete-btn',function() {
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: ' mx-2',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            })
            var url = $(this).attr('link');
            swalWithBootstrapButtons.fire({
                title: '<?= __('Are you sure about this decision?') ?>',
                  text: "<?= __("You can't undo it") ?>!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: ' <a class="btn btn-primary text-white" href="' + url + '"><?= __('Yes') ?> !</a> ',
                cancelButtonText: ' <?= __('Cancel') ?>! ',
                reverseButtons: true
            }).then((result) => {
                if (result.value != true)
                    (
                        /* Read more about handling dismissals below */
                        result.dismiss === Swal.DismissReason.cancel
                    )
            });
        });
</script>

<?=message_box('error')?>
<?=message_box('success')?>