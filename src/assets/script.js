document.addEventListener("DOMContentLoaded", () => {
    let tela = "pessoaFisica";

    const mudarTela = (esconde, mostra) => {
        document.getElementById(esconde).style.display = "none";
        document.getElementById(mostra).style.display = "block";

        tela = mostra;
    }

    document.getElementById("menupf").addEventListener("click", (e) => {
        e.preventDefault()
        mudarTela("cnpj", "pessoaFisica");
    });

    document.getElementById("menucnpj").addEventListener("click", (e) => {
        e.preventDefault();
        mudarTela("pessoaFisica", "cnpj")
    });



    const ajax = (url, parametros, metodo, callback) => {
        let req = new XMLHttpRequest();

        metodo ? "" : metodo = "GET";

        if (req) {
            req.open(metodo, url, true);
            req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            req.send(parametros);
            req.onreadystatechange = callback;
        } else {
            alert("Erro na requisição");
        }
    }

    const ajaxPessoaFisica = (res) => {
        if (res.target.readyState == 4) {
            //document.querySelector('tbody').remove()
            let elemento = document.querySelector("tbody");
            while (elemento.firstChild) {
                elemento.removeChild(elemento.firstChild);
            }

            data = JSON.parse(res.target.response);
            console.log(data)
            let html = '';

            Object.keys(data).forEach(elem => {
                html = + "<tbody> <tr> <td>" + elem.id + "</td>" +
                    "<td>" + elem.nome + "</td>" +
                    "<td>" + elem.categoria + "</td>" +
                    "<td>" + elem.cpf + "</td>" +
                    "<td>" + elem.data_nascimento + "</td>" +
                    " </tr> </tbody>"
            });
            document.querySelector('table').insertAdjacentHTML('beforeend', html);
        }
    }


    const ajaxCnpj = (res) => {
        if (res.target.readyState == 4) {
            
            let elemento = document.querySelector("tbody");
            while (elemento.firstChild) {
                elemento.removeChild(elemento.firstChild);
            }

            data = JSON.parse(res.target.response);
            let html = '';
            
            Object.keys(data).forEach(elem => {
                console.log(elem)
                html = + "<tbody> <tr> <td>" + elem.clientes_p_juridica + "</td>" +
                    "<td>" + elem.nome_fantasia + "</td>" +
                    "<td>" + elem.categoria + "</td>" +
                    "<td>" + elem.cnpj + "</td>" +
                    "<td>" + elem.inscricao_estadual + "</td>" +
                    "<td>" + elem.endereco + "</td>" +
                    " </tr> </tbody>"
            });
            document.querySelector('table').insertAdjacentHTML('beforeend', html);
        }
    }


    document.querySelector('#buscar').addEventListener("keyup", (e) => {
        let url = `./src/pesquisar.php/pesquisar?busca=${e.target.value}&cate=${tela}`;

        ajax(url, null, "GET", ajaxPessoaFisica);
    });

});