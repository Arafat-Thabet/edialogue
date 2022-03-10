
<x-app-layout>
<script srsc="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.all.min.js"></script>
<div class="flex  justify-center bg-gray-100">
<div class="col-lg-12">
  <section class="p-5 content bg-white">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('')}}">{{ __('Dashboard')}}</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ __('Notifications')}}</li>
      </ol>
    </nav>
    <div class="container">
        <div class="table-responsive">
    <table class="table table-borderd" id="notifications-table">
<thead class="text-center">
    <th>{{__('id')}}</th>
    <th>{{__('Title')}}</th>
    <th>{{ __('Sender')}}</th>
    
    <th> {{ __('Created at')}}</th>
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
        $('#notifications-table').DataTable({
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
            ajax: "{{route('notifications-data')}}",
            aoColumns: [
      
                
        { data: 'DT_RowIndex', name: 'DT_RowIndex' , orderable: false, searchable: false },
        { mData: 'title' },
        { mData: 'name' },
        { mData: 'created_at' },

        { mData: 'action' },
        
  
 
    ],
});
    });
</script>


<?=message_box('error')?>
<?=message_box('success')?>