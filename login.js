window.onload = () => {
    var form = document.getElementById("loginForm");

    form.addEventListener("submit", async function(event) {
        event.preventDefault();
        var formData = new FormData(form);

        await fetch("http://localhost:3000/login.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: formData
        })
        .then(function(response) {
            if (!response.ok){
                throw new Error("Server error!");
            }
            return response.json();
        })
        .then(function(data){
            console.log(data);
        })
    })
}
