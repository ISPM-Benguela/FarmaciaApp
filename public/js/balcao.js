$(document).ready(function() {
    var path = "http://127.0.0.1:8000/admin/pesquisa-cliente";
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        }
    });
    /**Pesquisar cliente */
    $("#cliente").typeahead({
        source: function(query, process) {
            return $.get(path, { query: query }, function(data) {
                return process(data);
            });
        }
    });

    /** Cadastrar cliente */
    $(document).on("click", "#save", function() {
        let name = $("#name").val();
        console.log(name);
    });
});
