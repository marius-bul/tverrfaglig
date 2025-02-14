function validateForm() {
    // Henter verdien fra passordfeltet
    let pass = document.getElementById("password").value;
    let confirmPass = document.getElementById("confirm_password").value;

    // Sjekker om passordene er like
    if (pass !== confirmPass) {
        alert("Passordene matcher ikke!"); // Viser en advarsel hvis de ikke matcher
        return false; // Stopper innsending av skjemaet
    }
    return true; // Fortsetter innsendingen hvis passordene matcher
}

function buyProduct(productName) {
    let username = prompt("Skriv inn brukernavnet ditt for å kjøpe:"); // Be brukeren skrive inn sitt navn

    if (username) {
        fetch("buy.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded"
            },
            body: `username=${encodeURIComponent(username)}&product=${encodeURIComponent(productName)}`
        })
        .then(response => response.text())
        .then(data => alert(data))
        .catch(error => console.error("Feil:", error));
    }
}
