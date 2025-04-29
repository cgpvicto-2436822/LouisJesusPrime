function validerFormulaireResultat(event) {

    let scoreValide = false;
    let rangValide = false;
    let dateValide = false;

    let equipe = document.getElementById("equipe");
    let score = document.getElementById("score");
    let rang = document.getElementById("rang");
    let date = document.getElementById("date");

    let scoreerreur = document.getElementById("scoreerreur");
    let rangerreur = document.getElementById("rangerreur");
    let dateerreur = document.getElementById("dateerreur");

    if (score.value !== "" && score.value >= 0 && score.value <= 100) {
        scoreValide = true;
        scoreerreur.classList.remove("error-message");
        scoreerreur.style.display = "none";
    } else {
        scoreerreur.classList.add("error-message");
        scoreerreur.style.display = "block";
    }

    if (rang.value !== "" && rang.value > 0 && rang.value < 11) {
        rangValide = true;
        rangerreur.classList.remove("error-message");
        rangerreur.style.display = "none";
    } else {
        rangerreur.classList.add("error-message");
        rangerreur.style.display = "block";
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


    if (!scoreValide || !dateValide || !rangValide) {
        event.preventDefault(); // ceci annule la soumission du formulaire
    }
}