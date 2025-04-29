
function validerFormulaireJoueur(event) {

    let nomValide = false;
    let prenomValide = false;
    let emailValide = false;
    let dateValide = false;
    let pseudoValide = false;

    let nom = document.getElementById("nom");
    let prenom = document.getElementById("prenom");
    let email = document.getElementById("email");
    let date = document.getElementById("date");
    let pseudo = document.getElementById("pseudo");

    let nomerreur = document.getElementById("nomerreur");
    let prenomerreur = document.getElementById("prenomerreur");
    let emailerreur = document.getElementById("emailerreur");
    let dateerreur = document.getElementById("dateerreur");
    let pseudoerreur = document.getElementById("pseudoerreur");

    if (nom.value !== "") {
        nomValide = true;
        nomerreur.classList.remove("error-message");
        nomerreur.style.display = "none";
    } else {
        nomerreur.classList.add("error-message");
        nomerreur.style.display = "block";
    }

    if (prenom.value !== "") {
        prenomValide = true;
        prenomerreur.classList.remove("error-message");
        prenomerreur.style.display = "none";
    } else {
        prenomerreur.classList.add("error-message");
        prenomerreur.style.display = "block";
    }

    const emailRegexJoueur = /^[\w-\.]+@[\w-]+\.[a-z]{2,4}$/i; //source: stackOverFlow
    if (emailRegexJoueur.test(email.value) && email.value !== "") {
        emailValide = true;
        emailerreur.classList.remove("error-message");
        emailerreur.style.display = "none";
    } else {
        emailerreur.classList.add("error-message");
        emailerreur.style.display = "block";
    }

    if (date.value != "") {

            dateValide = true;
            dateerreur.classList.remove("error-message");
            dateerreur.style.display = "none";
    }
    else {
        dateerreur.classList.add("error-message");
        dateerreur.style.display = "block";
    }

    if (pseudo.value !== "") {
        pseudoValide = true;
        pseudoerreur.classList.remove("error-message");
        pseudoerreur.style.display = "none";
    } else {
        pseudoerreur.classList.add("error-message");
        pseudoerreur.style.display = "block";
    }

    if (!nomValide || !emailValide || !dateValide || !pseudoValide || !prenomValide) {
        event.preventDefault(); // ceci annule la soumission du formulaire
    }
}