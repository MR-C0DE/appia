let affiche_article = () => {
    let requete = new XMLHttpRequest();
    requete.onload = () => {
        let article = $('div.article');
        article.html(requete.responseText);

    };
    requete.open('GET', './../php/other/article.php', false);
    requete.send();
};

affiche_article();


let addElementInCookie = (id, select) => {
    let requete = new XMLHttpRequest();
    requete.onload = () => {
        let rep = $('#' + id + ' .reponse');

        if (requete.responseText.split('-')[0].length > 7) {

            $('span.cpt').text('(' + requete.responseText.split('-')[1] + ')');

            rep.css('padding', '.1rem .7rem');
            rep.css('backgroundColor', 'rgb(231, 147, 147)');
            rep.css('color', 'rgb(146, 25, 25)');
            rep.text(requete.responseText.split('-')[0]);


        } else {
            $('span.cpt').text('(' + requete.responseText.split('-')[1] + ')');
            rep.css('padding', '.1rem .7rem');
            rep.css('backgroundColor', '#a8e0b2');
            rep.css('color', 'rgb(25, 146, 25)');
            rep.text('produit ajouté avec succès');


        }
        setTimeout(() => {
            rep.css('padding', '0');
            rep.css('backgroundColor', 'none');
            rep.css('color', 'none');
            rep.text('');
        }, 3000);

    };
    requete.open('GET', './../php/other/panier_cookie.php?id=' + (id.split('-'))[1] + '&type=' + select, false);
    requete.send();

};


let buttons = document.querySelectorAll('.article button');
buttons.forEach(btn => {
    btn.addEventListener('click', () => {

        let parentElement = btn.parentElement;
        let id = parentElement.getAttribute('id');
        let select = $('#' + id + ' #choix');


        if (select.val() === '0') {
            select.css('backgroundColor', 'red');
        } else {
            select.css('backgroundColor', 'rgb(146, 169, 177)');
            addElementInCookie(id, select.val());
        }

    });

});