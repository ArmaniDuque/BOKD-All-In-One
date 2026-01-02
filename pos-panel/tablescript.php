<script type="text/javascript">
$(document).ready(function() {
    $('#tablescript').DataTable({
        // Enable horizontal scrolling
        scrollX: true,
        // Enable vertical scrolling and set fixed height for table body
        scrollY: '400px', // Adjust height as needed
        // Optionally disable pagination if scrollY is used to show all data

        // Enable filtering (search box) and control DOM elements
        dom: 'irt', // Only show info, table, and row count/processing
        // Make the table column widths flexible to content if no explicit width is set
        autoWidth: false,
        // Adjust scrollCollapse to true if you want table to collapse its height
        scrollCollapse: true,
        "pageLength": 15,
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
});

$('#tablescript [data-toggle="tooltip"]').tooltip({
    animated: 'fade',
    placement: 'bottom',
    html: true
});
</script>