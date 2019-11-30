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
    $(document).on("click", "#save", function(e) {
        e.preventDefault();
        let name = $("#name").val();
        let createForm = $("#form-create-cliente");

        $.ajax({
            type: "POST",
            url: "http://127.0.0.1:8000/admin/cadastrar-cliente",
            data: { name: name },
            success: function(response) {
                if (response.error) {
                    $('input[name="name"]').after(
                        '<p class="text-danger">' + response.error + "</p>"
                    );
                } else {
                    $("#form-create-cliente").trigger("reset");
                    $("#clienteModal").modal("hide");
                    $(".success").addClass("message-show");
                    $(".success").html("<p>" + response.success + "</p>");
                    console.log(response.success);
                }
            }
        });
    });
});
