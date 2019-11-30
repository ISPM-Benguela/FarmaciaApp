$(document).ready(function() {
    $("#example").DataTable({
        buttons: [
            "copy",
            "excelFlash",
            "excel",
            "pdf",
            "print",
            {
                text: "Reload",
                action: function(e, dt, node, config) {
                    dt.ajax.reload();
                }
            }
        ]
    });
});
