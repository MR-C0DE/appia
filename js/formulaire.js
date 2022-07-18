let champs = document.querySelectorAll('table input');
let bouton = document.querySelector('#btn-sv');
let interval = null;



let DateNaissance = {
    jour: 1,
    mois: 1,
    annee: 1999,
    __init: function(annee, mois, jour) {
        this.annee = annee;
        this.mois = mois;
        this.jour = jour;
    },

    getDateFormat: function() {
        return this.annee + '-' + this.mois + '-' + this.jour;
    },

    ajuste: function(valeur) {
        if (valeur < 10) {
            return '0' + valeur;
        } else {
            return valeur;
        }
    },

    today: function() {
        let date_today = new Date();
        let day = date_today.getDate();
        let month = this.ajuste(date_today.getMonth() + 1);
        let year = date_today.getFullYear();
        return year + '-' + month + '-' + day;
    },
    ajusteAge: function(age, jour, mois) {
        if (mois > this.mois) {

            age--;
        } else if (mois <= this.mois) {

            if (jour > this.jour) {

                age--;
            }
        }
        return age;
    },
    getAge: function() {

        let date_today = new Date();
        let day = date_today.getDate();
        let month = this.ajuste(date_today.getMonth() + 1);
        let year = date_today.getFullYear();
        let age = year - this.annee;
        age = this.ajusteAge(age, day, month)
        return age;
    },

    getPermission: function() {
        if (this.getAge() >= 19) {
            return true;
        } else {
            return false;
        }
    }

};

//Verification d'adresse courriel avec ajax.
let verifierEmail = (email, erreurs) => {

    if (email.length != 0) {

        const xhttp = new XMLHttpRequest();
        xhttp.onload = () => {
            let resultat = xhttp.responseText.replace(' ', '');
            resultat = resultat === 'true' ? true : false;
            if (resultat) {
                erreurs.push('<strong style="font-weight: bold;">Adresse email déjà utlilisé!</strong>');
            }
        };
        xhttp.open('GET', './../php/other/emailCheck.php?query=' + email, false); // execution synchrone
        xhttp.send();
    }
}




let Password = {
    pass: '',
    confirm: null,
    __init: function(pass, confirm) {
        this.pass = pass;
        this.confirm = confirm;
    },
    checkLength: function() {
        return (this.pass.length > 4 && this.pass.length < 13);
    },
    checkEquals: function() {
        return this.pass === this.confirm;
    }
};





let vide = (champ, nom, erreurs) => {
    if (champ.value.length === 0) {
        erreurs.push('Le champ ' + nom + ' est vide!');
    }
}



let checkChampsVide = (champs, erreurs) => {
    vide(champs[0], 'nom', erreurs);
    vide(champs[1], 'prenom', erreurs);
    vide(champs[2], 'adresse', erreurs);
    vide(champs[3], 'code postal', erreurs);
    vide(champs[4], 'ville', erreurs);
    vide(champs[5], 'telephone', erreurs);
    vide(champs[6], 'date de naissance', erreurs);
    vide(champs[7], 'email', erreurs);
    vide(champs[8], 'mot de passe', erreurs);
    vide(champs[9], 'confirmation', erreurs);
}





let checkAge = (champ) => {
    let content = champ.value;
    let array = champ.value.split('-');
    DateNaissance.__init(parseInt(array[0]), parseInt(array[0]), parseInt(array[0]));
    return DateNaissance.getPermission();
}






let execute = () => {
    let erreurs = [];
    let erreursLog = [];
    checkChampsVide(champs, erreurs);
    verifierEmail(champs[7].value, erreurs);

    if (erreurs.length === 0) {
        Password.__init(champs[8].value, champs[9].value);
        if (checkAge(champs[6]) === false) {
            erreursLog.push('Vous devez avoir 19ans ou plus pour effectuer des achats sur ce site!');
        } else

        if (Password.checkLength() === false) {
            erreursLog.push('La longueur du mot de passe doit etre entre 5 et 12!');
        } else

        if (Password.checkEquals() === false) {
            erreursLog.push('Mot de passe de confirmation incorrecte!');
        }
    }


    let div = document.querySelector('.panel-error');
    if (erreurs.length === 0 && erreursLog.length === 0) {

        interval = setInterval(
            () => {
                div.style.display = 'none';
                div.innerHTML = '';

                bouton.value = "Soumettre";
                bouton.setAttribute('type', 'submit');
            },
            500
        );

    } else {

        div.style.display = 'block';
        div.innerHTML = '';

        erreurs.forEach(element => {
            let paragra = '<p>' + element + '</p>'
            div.innerHTML += paragra;
            console.log(element);
        });

        erreursLog.forEach(element => {
            let paragra = '<p>' + element + '</p>'
            div.innerHTML += paragra;
            console.log(element);
        });
    }
};

bouton.addEventListener('click', execute);



// Juste une petite mesure de securité. 
// Script permettant de ramener la verification du formulaire.
champs.forEach(champ => {
    champ.addEventListener('input', () => {
        bouton.value = "Verifier le formulaire";
        bouton.setAttribute('type', 'button');
        clearInterval(interval);
    });
});