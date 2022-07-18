var productList = [];
var deletaProd = [];

function prodGet(url) {
    let request = new XMLHttpRequest()
    request.open("GET", url, false)
    request.send()
    return request.responseText
}

function insProd(table) {
    // CRIAÇÃO DA LINHA
    let prod = document.createElement("tr");
    let nuItem = document.createElement("li");
    let tdCodbarras = document.createElement("td");
    let tdNome = document.createElement("td");
    let tdValor = document.createElement("td");
    let tdQtd = document.createElement("td");
    let tdMedida = document.createElement("td");
    let btnRemove = document.createElement("a");
    let imgRemove = document.createElement("img");

    // ATRIBUIÇÃO DE VALORES
    btnRemove.setAttribute("onclick", "removeProd('" + table.codBarras + "'); valorTotal();");
    imgRemove.src = "assets/dash-square.svg";
    imgRemove.style.placeItems = "center";
    tdQtd.style.textAlign = "center";
    tdCodbarras.style.textAlign = "center";
    tdMedida.style.textAlign = "center";
    tdNome.style.textAlign = "center";
    tdValor.style.textAlign = "center";
    nuItem.style.textAlign = "center";
    
    // ATRIBUTOS
    prod.appendChild(nuItem);
    prod.appendChild(tdCodbarras);
    prod.appendChild(tdNome);
    prod.appendChild(tdValor);
    prod.appendChild(tdQtd);
    prod.appendChild(btnRemove);
    btnRemove.appendChild(imgRemove);
    prod.appendChild(tdMedida);
    
    // VALORES
    tdCodbarras.innerHTML = table.codBarras
    tdNome.innerHTML = table.nome
    tdValor.innerHTML = table.valor
    tdQtd.innerHTML = "<span id=" + table.codBarras + ">" + table.qtd + "</span>"
    tdMedida.innerHTML = table.medida
    
    return prod;
}

// FUNÇÃO QUE CRIA A TABELA
function connect() {
    let barcode = document.getElementById("barcode").value;
    let data = prodGet("/get_produtos.php?barcode=" + barcode);
    let product = JSON.parse(data);
    if(product.length > 0) {
        let index = productList.findIndex(codBarras => codBarras.codBarras == barcode);
        if(index == -1) {
            product[0].qtd = 1;
            productList.push(product[0]);
            let table = document.getElementById("table");
            product.forEach(element => {
                let prod = insProd(element);
                table.appendChild(prod);
            });
        } else {
            productList[index].qtd++;
            document.getElementById(barcode).innerHTML = productList[index].qtd;
        }
    }
}

// FUNÇÃO QUE REMOVE A LINHA
function removeProd(barcode) {
    let index = productList.findIndex(codBarras => codBarras.codBarras == barcode);
    productList[index].qtd--;
    if(productList[index].qtd == 0) {
        productList.splice(index, 1);
        let table = document.getElementById("table");
        let prod = document.getElementById(barcode).parentNode.parentNode;
        table.removeChild(prod);
    } else {
        document.getElementById(barcode).innerHTML = productList[index].qtd;
    }
}

// FUNÇÃO QUE MULTIPLICA QTD E VALOR
function valorTotal() {
    let total = 0;
    productList.forEach(element => {
        total += element.valor * element.qtd;
    });
    document.getElementById("total").innerHTML = total;
}