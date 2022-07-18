let annimation = () => {

    let index = 1;
    let changement = () => {
        let img = $('.image-slide');
        let file = index + '.png';
        let path = './../img/' + file;
        img.attr('src', path);

        index++;
        if (index >  6) {
            index = 1;
        }
    };

    setInterval(changement, 4000);
}
annimation();