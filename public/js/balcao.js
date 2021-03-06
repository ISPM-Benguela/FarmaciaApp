$(document).ready(function() {
    var table = $("#itemTable").DataTable();

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
    $("#produtos").keyup(function() {
        let query = $(this).val();
        let _token = $('input[name="_token"]').val();
        console.log(_token);

        $.ajax({
            url: pathProduto,
            method: "POST",
            data: { query: query, _token: _token },
            success: function(data) {
                console.log(data);

                $("#produtoList").fadeIn();
                $("#produtoList").html(data);
            }
        });
    });
    $(".produto").click(function() {});

    $("#produtoList").on("click", "li", function() {
        $("#produtos").val($(this).text());
        $("#produtoList").fadeOut();
    });

    $("#cliente").on("change", function() {
        let cliente = $("#cliente").val();
        $("#user").val(cliente);
    });

    // Pegar o preco do produto
    /*
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

                    let data = Array.from(response.success);
                    data.forEach(element => {
                        if (element.nome === produto) {
                            $('input[name="preco"]').val(element.preco + " Kz");
                            //total += element.preice *
                        }
                    });
                }
            }
        });
    });
    $(document).on("click", "#btn-vender", function(e) {
        e.preventDefault();
        let produto = $('input[name="produtos"]').val();
        let cliente = $('input[name="cliente"]').val();
        let quantidade = $('input[name="quantidade"]').val();

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

    /** Item de venda 
    $(document).on("click", "#btn-vender", function(e) {
        e.preventDefault();

        let produtos = $('input[name="produtos"]').val();
        let cliente = $('input[name="cliente"]').val();
        let quantidade = $('input[name="quantidade"]').val();

        console.log(`${produtos} ${cliente} ${quantidade}`);

        $.ajax({
            type: "POST",
            url: "http://127.0.0.1:8000/admin/balcao-vender",
            data: {
                produtos: produtos,
                cliente: cliente,
                quantidade: quantidade
            },
            success: function(response) {
                console.log(response.data.preco);
            }
        });
    });*/
});
