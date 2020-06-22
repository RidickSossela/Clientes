/* 
    Recebe um objeto;
    Parametros url, parametros, metodo, callback;
*/
const ajax = (obj) => {    
    let req = new XMLHttpRequest();

    obj.metodo ? "" : obj.metodo = "GET";

    if (req) {
        req.open(obj.metodo, obj.url, true);
        req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        req.send(obj.parametros);
        req.onreadystatechange = obj.callback;
    } else {
        alert("Erro na requisição");
    }
}