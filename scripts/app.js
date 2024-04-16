function transformToDict(pureForm){
    var formData = new FormData(pureForm);
    var formDataObject = {};
    formData.forEach(function(value, key){
        console.log(key + " : " + value);
        formDataObject[key] = value;
    });

    return formDataObject;
}

async function sendRequest(formData){
    var uri = "../php_files/submitFeedback.php";
    fetch(uri, {
        method: 'POST',
        headers: {
            "Content-Type": "application/json"
        },
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        
        document.getElementById('reponseContaineur').innerHTML = `<p>${data.message}</p>`;
    })
    .catch(error => console.error('Ошибка:', error));
}

window.onload = () => {
    var form = document.getElementById('feedbackForm');
    
    form.addEventListener('submit', async (event) => {
        event.preventDefault();

        var formDict = transformToDict(form);
        var obj = {
            "vals" : Object.values(formDict)
        }
        await sendRequest(JSON.stringify(obj));

    });
}
