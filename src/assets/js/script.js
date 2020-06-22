document.addEventListener("DOMContentLoaded", () => {
    let tela = "pessoaFisica";

    const mudarTela = (esconde, mostra) => {
        document.getElementById(esconde).style.display = "none";
        document.getElementById(mostra).style.display = "block";

        tela = mostra;
    }

    document.getElementById("menupf").addEventListener("click", () => mudarTela("cnpj", "pessoaFisica"));
    document.getElementById("menucnpj").addEventListener("click", () => mudarTela("pessoaFisica", "cnpj"));

    const ajaxPessoaFisica = (res) => {
        let tbody = document.getElementById("tbody-pf");
        let html = '';
        let data = '';

        if (res.target.readyState == 4) {
            data = JSON.parse(res.target.response);

            while (tbody.firstChild) {
                tbody.removeChild(tbody.firstChild);
            }
            if (typeof data.erro === 'undefined') {
                data.forEach((cliente) => {
                    html += "<tbody> <tr> <td>" + cliente.id_cliente + "</td>" +
                        "<td>" + cliente.nome + "</td>" +
                        "<td>" + cliente.categoria + "</td>" +
                        "<td>" + cliente.cpf + "</td>" +
                        "<td>" + cliente.data_nascimento + "</td>" +
                        " </tr> </tbody>"
                });
            } else {
                html += `<tr><td colspan="5">${data.erro}</td</tr>`;
            }

            tbody.insertAdjacentHTML('beforeend', html);
        }
    }

    const ajaxCnpj = (res) => {
        let tbody = document.getElementById("tbody-cnpj");
        let html = '';
        let data = '';

        if (res.target.readyState == 4) {
            data = JSON.parse(res.target.response);

            while (tbody.firstChild) {
                tbody.removeChild(tbody.firstChild);
            }
            if (typeof data.erro === 'undefined') {
                data.forEach((cliente) => {
                    html += "<tbody> <tr> <td>" + cliente.clientes_p_juridica + "</td>" +
                        "<td>" + cliente.nome_fantasia + "</td>" +
                        "<td>" + cliente.categoria + "</td>" +
                        "<td>" + cliente.cnpj + "</td>" +
                        "<td>" + cliente.inscricao_estadual + "</td>" +
                        "<td>" + cliente.endereco + "</td>" +
                        " </tr> </tbody>"
                });
            } else {
                html += `<tr><td colspan="6">${data.erro}</td</tr>`;
            }
            tbody.insertAdjacentHTML('beforeend', html);
        }
    }

    document.querySelector('#buscar').addEventListener("keyup", (e) => {
        let url = `./src/Controller/pesquisar.php/pesquisar?busca=${e.target.value}&cate=${tela}`;

        if (tela == "pessoaFisica") {
            ajax({
                url,
                parametros: null,
                metodo: "GET", 
                callback: ajaxPessoaFisica
            });
        } else {
            ajax({
                url,
                parametros: null,
                metodo: "GET",
                callback: ajaxCnpj
            });
        }
    });

});




