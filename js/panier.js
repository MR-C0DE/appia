let countArticle = () => {
    let inputs = document.querySelectorAll('table tbody td input');
    let somme = 0;
    inputs.forEach(input => {
        somme += parseInt(input.value);
    });

    return somme;
}
let typeAllSisNumeric = () => {

    let typeElement = document.querySelectorAll('.type');
    let isIn = true;

    typeElement.forEach(element => {
        if (element.textContent != "Numérique") {
            isIn = false;
        }
    });

    return isIn;

}


let sommeNumerique = () => {
    let typeElement = document.querySelectorAll('.Numérique');
    let somme = 0;
    typeElement.forEach(element => {

        somme += parseFloat(element.parentElement.children[3].textContent.replace('$', ''));
    });
    return somme;
}



let TotalPrice = () => {
    let price_printer = document.querySelectorAll('.price_print');
    let prix = [];
    let somme = 0;

    const FRAIS_LIVRAISON = 10;

    let sous_total = $('.total span');
    let envoi = $('.envoi span');
    let finalTotal = $('.ttl span');
    let oneTotal = $('.info-head p span');


    sous_total.text(0);
    envoi.text(0);
    finalTotal.text(0);
    oneTotal.text(0);


    if (price_printer.length > 0) {

        price_printer.forEach(valeur => {
            prix.push(parseFloat(valeur.textContent.replace('$', '')));
        });

        prix.forEach(valeur => {
            somme += valeur;
        });
        somme = Math.round((somme) * 100) / 100;
        //Afficher le prix sous total
        sous_total.text(somme);

        // Ajouter un 10$ de livraison

        if ((somme - sommeNumerique()) < 100 && typeAllSisNumeric() == false) {
            envoi.text(FRAIS_LIVRAISON);
            somme = (FRAIS_LIVRAISON + somme);
        } else {
            envoi.text(0);

        }
        somme = Math.round((somme) * 100) / 100;
        finalTotal.text(somme);
        oneTotal.text(somme);
    }
}
TotalPrice();

let inputs = document.querySelectorAll('table td input');

inputs.forEach(input => {
    let idParent = input.parentNode.parentElement.getAttribute('id');
    let price = $('#' + idParent + ' .price_print');
    price = parseFloat(price.text().replace('$', ''));
    let prixAvant = price;
    input.addEventListener('input', () => {

        price = $('#' + idParent + ' .price_print');
        price = prixAvant * parseFloat(input.value);
        price = Math.round((price) * 1000) / 1000;
        $('#' + idParent + ' .price_print').text('');
        $('#' + idParent + ' .price_print').text(price + '$');
        TotalPrice();
    });
});

const processus = (element) => {
    let requete = new XMLHttpRequest();
    let tab = element.getAttribute('id');
    requete.onload = () => {

        element.remove();
        TotalPrice();

    }
    requete.open('GET', './../php/other/panier_efface.php?req1=' + (tab.split('_'))[1] + '&req2=' + (tab.split('_'))[2], false);
    requete.send();
}

let effacher_article = () => {
    let buttons = document.querySelectorAll('table.tab-article td button');
    buttons.forEach(btn => {
        btn.addEventListener('click', () => {
            processus(btn.parentElement.parentElement);
        });
    });
}

effacher_article();

/**
 * PARTIE Achat
 */
const desactiveChampsAjoute = () => {
    let inputs = document.querySelectorAll('.tab-article tbody td input');
    inputs.forEach(input => {
        input.disabled = true;
    });
}
const activeAchat = () => {
    $('.payer').on('click', () => {
        $('.btn-content').css('display', 'none');
        $('.achat').css('display', 'block');
        desactiveChampsAjoute();
    });
};
activeAchat();

const activeModificationBtn = () => {
    const btns = document.querySelectorAll('.modif-btn');
    btns.forEach(btn => {
        btn.addEventListener('click', () => {
            let element = btn.parentElement.parentElement.children[1].children[0];
            element.disabled = false;

        });
    });

}
activeModificationBtn();


let envoyerCommande = () => {
    let rhttp = new XMLHttpRequest();
    rhttp.onload = () => {};
    rhttp.open('GET', './../php/other/commande.php?send=true', false);
    rhttp.send();
}
let obtenirIdCommande = () => {
    let rhttp = new XMLHttpRequest();
    let id = 0;
    rhttp.onload = () => {
        id = parseInt(rhttp.responseText.replace(' ', ''));
    };
    rhttp.open('GET', './../php/other/commande.php?getting=true', false);
    rhttp.send();

    return id;
}
let obtenirIdClient = () => {
    let rhttp = new XMLHttpRequest();
    let id = 0;
    rhttp.onload = () => {
        id = parseInt(rhttp.responseText.replace(' ', ''));
    };

    rhttp.open('GET', './../php/other/soumission.php?getting=' + (obtenirIdCommande()), false);
    rhttp.send();
    return id;
}

let envoyerFormulaire = (quiz) => {
    let rhttp = new XMLHttpRequest();
    rhttp.onload = () => {

    };
    rhttp.open('GET', './../php/other/soumission.php?q=' + quiz, false);
    rhttp.send();
}

let envoyerFormulaireClient = (quiz) => {
    let rhttp = new XMLHttpRequest();
    rhttp.onload = () => {

    };
    rhttp.open('GET', './../php/other/soumission.php?fc=' + quiz, false);
    rhttp.send();
}

let destinationCommande = (quiz) => {
    let rhttp = new XMLHttpRequest();
    rhttp.onload = () => {

    };
    rhttp.open('GET', './../php/other/soumission.php?dc=' + quiz, false);
    rhttp.send();
}


let inputData = () => {
    let formulaires = document.querySelectorAll('.tab-form input');

    envoyerFormulaireClient(obtenirIdCommande() + '-%-' + formulaires[0].value +
        '-%-' + formulaires[1].value + '-%-' + formulaires[5].value + '-%-' + formulaires[7].value);

    destinationCommande(obtenirIdClient() + '-%-' + formulaires[2].value +
        '-%-' + formulaires[3].value + '-%-' + formulaires[4].value);
}


let confirmationAchatClient = () => {
    let formulaires = document.querySelectorAll('.tab-form input');
    let ul1 = document.createElement('ul');
    ul1.setAttribute('class', 'ulclient')
    let text = null;
    let lis = null;


    text = document.createTextNode('Votre nom : ' + formulaires[0].value + ' ' + formulaires[1].value);
    lis = document.createElement('li');
    lis.append(text);
    ul1.appendChild(lis);

    text = document.createTextNode('Votre adresse : ' + formulaires[2].value + ' ' + formulaires[4].value + ' ' + formulaires[3].value);
    lis = document.createElement('li');
    lis.append(text);
    ul1.appendChild(lis);

    text = document.createTextNode('Telephone : ' + formulaires[5].value);
    lis = document.createElement('li');
    lis.append(text);
    ul1.appendChild(lis);

    text = document.createTextNode('Email : ' + formulaires[6].value);
    lis = document.createElement('li');
    lis.append(text);
    ul1.appendChild(lis);

    text = document.createTextNode('Date de naissance : ' + formulaires[6].value);
    lis = document.createElement('li');
    lis.append(text);
    ul1.appendChild(lis);

    document.querySelector('.detail-client').appendChild(ul1);

}

let closeCookie = () => {
    let rhttp = new XMLHttpRequest();
    rhttp.onload = () => {
        let docs = document.querySelectorAll('.alan');
        docs.forEach(doc => {
            doc.remove();
        });

    }
    rhttp.open('GET', './../php/other/soumission.php?close=true', false);
    rhttp.send();
}

let confirmationAchatArticle = () => {

    let tbody = document.querySelector('tbody');
    let quantite = [];
    let prix = [];
    let nom = [];
    let type = [];
    let prixTLL = document.querySelectorAll('.price');
    let radio = document.querySelectorAll('input[type="radio"]');

    let ul1 = document.createElement('ul');
    ul1.setAttribute('class', 'ularticle')
    let text = null;
    let lis = null;

    let index = 0;
    for (let i = 0; i < radio.length; i++) {
        if (radio[i].checked == true) {

            index = radio[i].value;
        }

    }
    document.querySelector('.confirmation-achat h2 span').textContent = index;

    for (let i = 0; i < tbody.children.length; i++) {
        nom.push(tbody.children[i].children[0].children[0].children[1].textContent);
        type.push(tbody.children[i].children[1].textContent);
        prix.push(parseFloat(tbody.children[i].children[3].textContent));
        quantite.push(parseInt(tbody.children[i].children[2].children[0].value));
    }

    for (let i = 0; i < tbody.children.length; i++) {

        text = document.createTextNode('- ' + quantite[i] + ' x ' + nom[i] + ' ' + type[i] + ' : ' + prix[i] + '$');
        lis = document.createElement('li');
        lis.append(text);
        ul1.appendChild(lis);
    }

    text = document.createTextNode("- prix d'envoi retiré : " + prixTLL[1].textContent);
    lis = document.createElement('li');
    lis.append(text);
    ul1.appendChild(lis);

    document.querySelector('.detail-commande').appendChild(ul1);

    // Affichage du prix total dans la confirmation
    document.querySelector('.detail-prix h4').textContent = 'prix : ' + prixTLL[2].textContent;

    closeCookie();

}

let sendForm = () => {
    let bouton = document.querySelector('.soumission-button');
    bouton.addEventListener('click', () => {
        let tbody = document.querySelector('tbody');
        let idContent = [];
        let quantite = [];
        let prix = [];

        for (let i = 0; i < tbody.children.length; i++) {
            idContent.push(tbody.children[i].getAttribute('id').split('_'));
            prix.push(parseFloat(tbody.children[i].children[3].textContent.replace('$', '')));
            quantite.push(parseInt(tbody.children[i].children[2].children[0].value));
        }

        //Enregistré la commande.
        envoyerCommande();
        let idCommande = obtenirIdCommande();

        for (let i = 0; i < tbody.children.length; i++) {
            let prix_unitaire = Math.round((prix[i] / quantite[i]) * 100) / 100;
            envoyerFormulaire(idCommande + '-' + idContent[i][1] + '-' + idContent[i][2] + '-' + quantite[i] + '-' + prix_unitaire);
        }

        //Enregistré le formulaire.
        inputData();

        confirmationAchatClient();
        confirmationAchatArticle();
        $('.confirmation-achat').css('display', 'block');

    });
}
sendForm();

let validationFormulaire = () => {
    let formulaires = document.querySelectorAll('.tab-form input');

    formulaires.forEach(element => {
        element.addEventListener('input', () => {
            if (element.value.length <  3) {
                element.style.backgroundColor = "rgb(250, 220, 220)";
                document.querySelector('.soumission-button').disabled = true;

            } else {
                element.style.backgroundColor = "#ffffff";
                document.querySelector('.soumission-button').disabled = false;
            }

        });


    });


    formulaires[6].addEventListener('input', () => {
        let valeur = formulaires[6].value;
        let age = 2022 - parseInt(valeur.split('-')[0]);

        if (age >= 19) {
            formulaires[6].style.backgroundColor = "#ffffff";
            document.querySelector('.soumission-button').disabled = false;
        } else {
            formulaires[6].style.backgroundColor = "rgb(250, 220, 220)";
            document.querySelector('.soumission-button').disabled = true;
        }

    });





}

validationFormulaire();