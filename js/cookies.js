if (navigator.cookieEnabled === false) {
    document.querySelector('.wrapper').style.display = "none";
    document.querySelector('footer').style.display = "none";
    let corps = document.createElement('div');
    corps.setAttribute('class', 'alert-cookie-content');
    corps.style.color = "red";
    corps.style.fontSize = 1.2 + 'em';
    let ecrit = document.createElement('p');
    ecrit.innerText =
        "Nous avons remarqué que votre navigateur n'autorise pas l'utilisation des cookies.\n Activer les activer avant d'utiliser ce site web";
    corps.appendChild(ecrit);
    document.querySelector('body').appendChild(corps);
}