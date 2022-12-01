import send from "./send.js";

const form = document.getElementById('form');
let count = 0;
form.onsubmit = async (event) => {
    event.preventDefault();
    cost = parseFloat(document.getElementById("cost").value);
    const data = {
        productId:      document.getElementById("product-id").value,
        saleDate:    document.getElementById("sale-date").value,
        productName: document.getElementById("product-name").value,
        quantity:    document.getElementById("quantity").value,
        cost:        cost
    };

    let url = '../php/api/products/';
    const response = await fetch(url, {
        "method": 'POST',
        "body": JSON.stringify(data),
        "headers": {
            "Content-Type": 'application/json'
        }
    });
    
    let json = await response.json();
    handleViewLastProduct(response.status, json);  
    
}

function handleViewLastProduct(status, response){
    if(status !== 200){ 
        console.log("Status != 200. Fallo la request");
        return;
    }
    const tableBody = document.getElementById('last-tbody');
    if(count === 5){
        count = 0;
        tableBody.innerHTML = "";
    }
        
    let htmlText = "";
    let total = parseFloat(response.cost)*parseFloat(response.quantity);
        
    let json = [response.productId, response.saleDate , response.productName, response.cost, response.quantity, total];
    json.forEach((value) => htmlText +=`<td>${value}</td>`);
        
    tableBody.innerHTML += `<tr>${htmlText}</tr>`;
    count++;
}