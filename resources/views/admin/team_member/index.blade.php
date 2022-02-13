
<x-app-layout>
<script srsc="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.all.min.js"></script>

  <section class="p-5 content bg-white">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('')}}">{{ __('Dashboard')}}</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ __('Members List')}}</li>
      </ol>
    </nav>
    <div class="container">
    <table class="table table-striped" id="users-table">
<thead>
    <th>{{__('id')}}</th>
    <th>{{__('Name')}}</th>
    <th>{{__('Email')}}</th>
    <th>{{__('Created At')}}</th>
    <th>{{__('Updated At')}}</th>
    <th>{{__('Action')}}</th>
</thead>
    </table>
    </div>
  </section>
</x-app-layout>
<script>
    $(function() {
        $('#users-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{route('members')}}",
            aoColumns: [
      
        { mData: 'id' },
        { mData: 'name' },
        { mData: 'email' },
        { mData: 'created_at' },
        { mData: 'updated_at' },
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