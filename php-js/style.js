// document.cookie = 'style=' + value + ';expires=' + date.toUTCString() + ';path=/';

//pobiera nazwe np  style=xxx
function getCookie(cname) {
  var name = cname + '=';
  var decodedCookie = decodeURIComponent(document.cookie);
  var ca = decodedCookie.split(';');
  for(var i = 0; i < ca.length; i++) {
    var c = ca[i];
    while (c.charAt(0) == ' ') { //jesli spacje to przesuwa o 1
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) { //jesli nazwa jest na poczatku
      return c.substring(name.length, c.length);
    }
  }
  return '';
}

//gdy nowy styl, nowe cookie
function changeStyleCookie(value, daysLeft) {
  var date = new Date();
  date.setTime(date.getTime() + (daysLeft * 24 * 60 * 60 * 1000));
  document.cookie = 'style=' + value + ';expires=' + date.toUTCString()
+ ';path=/';
}

//sprawdzenie cookie na poczatku
function checkStyleCookie() {
  var cookieValue = getCookie('style'); //pobiera nazwe style=xxx

  if(cookieValue === '') cookieValue = 'Default'; //jesli domyslne
  console.log(cookieValue);

  var links = document.getElementsByTagName('link');

  var oneCssFlag = false; //na raz mozna ustawic jeden styl
  for(var i = 0; i < links.length; i++) {
    links[i].disabled = true; //na poczatek wszystko nieaktywne
    if(links[i].title === cookieValue && oneCssFlag === false) { //jesli natrafimy na wartosc rowna tej z cookie, ustawiamy ten styl
      links[i].disabled = false;
      oneCssFlag = true;
    }
  }
}

//generowanie listy stylow
function generateStyleLinks() {
  var links = document.getElementsByTagName('link');
  var menu = document.createElement('ul');

  var header = document.createElement('h3');
  header.innerHTML = "STYLE";
  document.getElementById('nav').appendChild(header);
 //menu.appendChild(header);
  for(var i = 0; i < links.length; i++) {
    var link = document.createElement('li');
    link.innerHTML = links[i].title;

    link.addEventListener('click', function(e) { //akcja po kliknieciu na dany styl
      var oneCssFlag = false; //jeden styl na raz
      for(var j = 0; j < links.length; j++) {
        links[j].disabled = true; //nieaktywne wszystkie
        if(links[j].title === e.target.innerHTML && oneCssFlag ===
false) { //e.target.innerHTML - obecny styl
          links[j].disabled = false;
          changeStyleCookie(links[j].title, 365);
          oneCssFlag = true;
        }
      }
    });

    menu.appendChild(link);
  }

  document.getElementById('nav').appendChild(menu);
}

//na start
document.addEventListener("DOMContentLoaded", function(event) {
  generateStyleLinks();
  checkStyleCookie();
});