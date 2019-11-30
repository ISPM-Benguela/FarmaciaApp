$(document).ready(function() {
    var pathCliente = "http://127.0.0.1:8000/admin/pesquisa-cliente";
    var pathProduto = "http://127.0.0.1:8000/admin/pesquisa-produto";
    var pathTest = "http://127.0.0.1:8000/admin/pesquisa-teste";
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        }
    });
    /**Pesquisar cliente */
    $("#cliente").typeahead({
        source: function(query, process) {
            return $.get(pathCliente, { query: query }, function(data) {
                console.log(data);
                return process(data);
            });
        }
    });

    /**Pesquisar produto */
    $("#produto").typeahead({
        source: function(query, process) {
            return $.get(pathProduto, { query: query }, function(data) {
                console.log(data);
                return process(data);
            });
        }
    });

    $("#test").typeahead({
        source: function(query, process) {
            return $.post(pathTest, { query: query }, function(data) {
                console.log(data);
                return process(data);
            });
        }
    });
    /* Pegar o preco do produto
    $("#produto").on("change", function() {
        let produto = $("#produto").val();
        let total = 0;
        let quantidate = $("input[name=quantidade]").val();

        $.ajax({
            type: "POST",
            url: "http://127.0.0.1:8000/admin/pesquisar-preco",
            data: { produto: produto },
            success: function(response) {
                if (response.success) {
                    console.log(response);

                    /*  let data = Array.from(response.success);
                    data.forEach(element => {
                        if (element.nome === produto) {
                            $('input[name="preco"]').val(element.preco + " Kz");
                            //total += element.preice *
                        }
                    });
                }
            }
        }); 
    }); */
    $(document).on("click", "#btn-vender", function(e) {
        e.preventDefault();
        let produto = $('input[name="produto"]').val();
        let cliente = $('input[name="cliente"]').val();
        let quantidade = $('input[name="quantidade"]').val();

        console.log(quantidade);

        $.ajax({
            type: "POST",
            url: "http://127.0.0.1:8000/admin/balcao-vender",
            data: {
                produto: produto,
                cliente: cliente,
                quantidade: quantidade
            },
            success: function(data) {
                console.log(data);
            }
        });
    });
    /** Cadastrar cliente */
    $(document).on("click", "#save", function(e) {
        e.preventDefault();
        let name = $("#name").val();

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
