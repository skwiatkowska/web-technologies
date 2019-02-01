//w formularzu communicator sa pola: activated, communicatorText, user_name, content

//wysylanie danych
function pushChatData() {
  if(document.getElementById('activated').checked) {
    var xmlhttp = new XMLHttpRequest(); //nowa instancja obiektu
    var userName = document.getElementById('user_name').value;
    var commentContent = document.getElementById('content').value;

    xmlhttp.open('GET',
'poll_add.php?user_name='+userName+'&content='+commentContent, true);
    xmlhttp.send();
  }
}

//pobranie danych
//w pliku poll.php kodowane (JSON) sa data i timestamp
function pullChatData(timestamp) { //timestamp wysylany do poll.php aby sprawdzic, czy minal czas
  var xmlhttp = new XMLHttpRequest();

  xmlhttp.onreadystatechange = function() { //onreadystatechange-co zrobic po otrzymaniu odp
    if (this.readyState == 4 && this.status == 200 &&
document.getElementById('activated').checked) {
      var responseObject = JSON.parse(this.responseText); //responseObject to tekst bedacy odpowiedzia zadania
//JSON.parse konwertuje tekst w formacie JSON na obiekt JS

      document.getElementById("communicatorText").innerHTML =
responseObject.data; //ustawienie tekstu w komunikatorze na wartosc z responseObject
console.log(responseObject.timestamp);
      if(document.getElementById('activated').checked) {
        pullChatData(responseObject.timestamp); //pobieranie nowych wiadomosci
      }
    }
  }

  xmlhttp.open('GET', 'poll.php?timestamp=' + timestamp, true); //true-asynchroniczne, wykonywanie funkcji JS kontynuowane podczas oczekiwania na odp serwera
  xmlhttp.send();
}

document.getElementById('activated').onchange = function(e) {
  if(e.target.checked === true) {
    pullChatData();
  }
}


document.getElementById('communicator').onsubmit = function(event) {
  event.preventDefault();
  if(document.getElementById('activated').checked) {
    pushChatData();
  }
  else alert("Czat nieaktywny");
  document.getElementById('content').value = '';
}