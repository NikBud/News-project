function transformToJSON(pureForm){
    var formData = new FormData(pureForm);
    var formDataObject = {};
    formData.forEach(function(value, key){
        formDataObject[key] = value;
    });

    // Преобразуем объект данных в JSON
    return JSON.stringify(formDataObject);
}

window.onload = () => {
    var form = document.getElementById("loginForm");

    form.addEventListener("submit", async function(event) {
        event.preventDefault();
        
        var jsonData = transformToJSON(form);

        await fetch("../php_files/login.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: jsonData
        })
        .then(function(response) {
            if (!response.ok){
                throw new Error("Server error!");
            }
            return response.json();
        })
        .then(function(data){
            var res = data["credentialsOk"];
            console.log(res);
            var incorrectCredentials = document.getElementById("invalidCredentials");
            if (res == 0){
                incorrectCredentials.style.display = "flex";
            }
            else{
                incorrectCredentials.style.display = "none";
            }
        })
    })
}
