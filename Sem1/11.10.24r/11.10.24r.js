var zdjecia = [
    ['obraz1.jpeg', 'Jezioro', 'Dostojne jezioro'],
    ['obraz2.webp', 'Kot', 'Czarno-biały kot'],
];


var currentIndex = 0;

function laduj() {
    zmien(0);
}

function zmien(id) {
    currentIndex = id;
    document.getElementById('zdjecie').innerHTML = '<img src="' + zdjecia[id][0] + '" />';
    document.getElementById('informacje').innerHTML = '<b>' + zdjecia[id][1] + '</b><br><i>' + zdjecia[id][2] + '</i>';
}

function nastepneZdjecie() {
    currentIndex = (currentIndex + 1) % zdjecia.length;
    zmien(currentIndex);
}

function poprzednieZdjecie() {
    currentIndex = (currentIndex - 1) % zdjecia.length;
    zmien(currentIndex);
}

window.onload = laduj;