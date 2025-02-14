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
