	$(document).ready(function() {
    $('#report').DataTable( {

        "bDestroy": true,
       
        dom: 'Bfrtip',
        
        buttons: [
            'copy', 'excel', 'print'
        ]
    });
});