
function validerFormulaireEquipe(event) {

    let nomValide = false;
    let sloganValide = false;
    let dateValide = false;
    let commentaireValide = false;

    let nom = document.getElementById("nom");
    let slogan = document.getElementById("slogan");
    let date = document.getElementById("date");
    let commentaire = document.getElementById("commentaire");

    let nomerreur = document.getElementById("nomerreur");
    let commentaireerreur = document.getElementById("commentaireerreur");
    let dateerreur = document.getElementById("dateerreur");
    let sloganerreur = document.getElementById("sloganerreur");

    if (nom.value !== "") {
        nomValide = true;
        nomerreur.classList.remove("error-message");
        nomerreur.style.display = "none";
    } else {
        nomerreur.classList.add("error-message");
        nomerreur.style.display = "block";
    }

    if (slogan.value !== "") {
        sloganValide = true;
        sloganerreur.classList.remove("error-message");
        sloganerreur.style.display = "none";
    } else {
        sloganerreur.classList.add("error-message");
        sloganerreur.style.display = "block";
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

    if (commentaire.value !== "") {
        commentaireValide = true;
        commentaireerreur.classList.remove("error-message");
        commentaireerreur.style.display = "none";
    } else {
        commentaireerreur.classList.add("error-message");
        commentaireerreur.style.display = "block";
    }

    if (!nomValide || !dateValide || !commentaireValide || !sloganValide) {
        event.preventDefault(); // ceci annule la soumission du formulaire
    }
}