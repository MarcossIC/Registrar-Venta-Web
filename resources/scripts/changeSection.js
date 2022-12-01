const agree = document.getElementById('agree');
const view = document.getElementById('view');

const sectionView  = document.getElementById('section-view');
const sectionAgree = document.getElementById('section-agree');

agree.onclick = () =>{
    sectionView.style.display = "none";
    sectionAgree.style.display = "flex";
}
view.onclick = async () =>{
    sectionAgree.style.display = "none";
    sectionView.style.display = "block";

    let url = '../php/api/products/';
        const response = await fetch(url, {
            "method": 'GET',
            "headers": {
                "Content-Type": 'application/json'
            }
        });
        let jsonArray = await response.json();
        
        handleResponseForTable(jsonArray, response.status);
}

function handleResponseForTable(jsonArray, status){
    
    const tableBody = document.getElementById('all-tbody');
    tableBody.innerHTML = null;
    console.log("si");
    if(status === 200){
        jsonArray.forEach(function(json){
            tableBody.innerHTML += 
            `<tr>
                <td>${json.productId}</td>
                <td>${json.saleDate}</td>
                <td>${json.productName}</td>
                <td>${json.cost}</td>
                <td>${json.quantity}</td>
            </tr>`;
        });
        
    } else {
        console.log("Status != 200. Fallo la request");
    }
}