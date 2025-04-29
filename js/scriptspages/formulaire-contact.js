
function validerFormulaire(event) {

    let nomValide = false;
    let emailValide = false;
    let sujetValide = false;
    let messageValide = false;

    let nom = document.getElementById("nom");
    let email = document.getElementById("email");
    let sujet = document.getElementById("sujet");
    let message = document.getElementById("message");

    let nomerreur = document.getElementById("nomerreur");
    let emailerreur = document.getElementById("emailerreur");
    let sujeterreur = document.getElementById("sujeterreur");
    let messageerreur = document.getElementById("messageerreur");

    if (nom.value !== "")
    {
        nomValide = true;
        nomerreur.classList.remove("error-message");
        nomerreur.style.display = "none";
    }
    else
    {
        nomerreur.classList.add("error-message");
        nomerreur.style.display = "block";
    }

    const emailRegex = /^[\w-\.]+@[\w-]+\.[a-z]{2,4}$/i; //source: stackOverFlow
    if (emailRegex.test(email.value) && email.value !== "")
    {
        emailValide = true;
        emailerreur.classList.remove("error-message");
        emailerreur.style.display = "none";
    }
    else
    {
        emailerreur.classList.add("error-message");
        emailerreur.style.display = "block";
    }

    if (sujet.value !== "")
    {
        sujetValide = true;
        sujeterreur.classList.remove("error-message");
        sujeterreur.style.display = "none";
    }
    else
    {
        sujeterreur.classList.add("error-message");
        sujeterreur.style.display = "block";
    }

    if (message.value !== "")
    {
        messageValide = true;
        messageerreur.classList.remove("error-message");
        messageerreur.style.display = "none";
    }
    else
    {
        messageerreur.classList.add("error-message");
        messageerreur.style.display = "block";
    }

    if (!nomValide || !emailValide || !sujetValide || !messageValide) {
        event.preventDefault(); // ceci annule la soumission du formulaire
    }
}
