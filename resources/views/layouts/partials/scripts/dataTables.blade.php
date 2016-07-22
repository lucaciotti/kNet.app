<script src="{{ asset('/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>

<script>
  $(function () {
    $(".dtTbls_full").DataTable({
      "iDisplayLength": 25,
    });
    $('.dtTbls_light').DataTable({
      "iDisplayLength": 25,
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
    $('.dtTbls_total').DataTable({
      "iDisplayLength": 15,
      "paging": true,
      "lengthChange": true,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "footerCallback": function ( row, data, start, end, display ) {
          var api = this.api(), data;

          // Remove the formatting to get integer data for summation
          var intVal = function ( i ) {
              return typeof i === 'string' ?
                  i.replace(/[\$,]/g, '')*1 :
                  typeof i === 'number' ?
                      i : 0;
          };

          // Total over all pages
          total = api
              .column( 6 )
              .data()
              .reduce( function (a, b) {
                  return intVal(a) + intVal(b);
              }, 0 );

          // Total over this page
          pageTotal = api
              .column( 6, { page: 'current'} )
              .data()
              .reduce( function (a, b) {
                  return intVal(a) + intVal(b);
              }, 0 );

          // Update footer
          $( api.column( 6 ).footer() ).html(
              total +' €'//+' ['+ total +' € Tot.Doc.]'
          );
      }
    });
  });
</script>

<style>
.dtTbls_light span {
    display:none;
}
.dtTbls_full span {
    display:none;
}
</style>
