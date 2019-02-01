var filesIndex = 1;

//przycisk na kolejny zalcznik
function addChooser(number) {
  var newFileInput = document.createElement('input');
  newFileInput.type = 'file';
  filesIndex++;
  newFileInput.name = 'fileToUpload' + filesIndex;
  //atrybut onchange ustawiony na wywolanie addChooser z kolejnym numerem
  newFileInput.setAttribute("onchange", "addChooser("+filesIndex+")");
//dodaje przycisk przed submit
  document.getElementsByTagName('form')[0].insertBefore(newFileInput,
document.getElementById('submit'));


document.getElementsByTagName('form')[0].insertBefore(document.createElement('br'),
document.getElementById('submit'));
}

function actualDate() {
  var date = new Date();

  var formatedDate = (date.getFullYear()) +
              '-' +
((date.getMonth()+1)<10?'0'+(date.getMonth()+1):(date.getMonth()+1)) +
              '-' +
(date.getDate()<10?'0'+date.getDate():date.getDate());

  document.getElementById('date').value = formatedDate;
}


function actualTime() {
  var date = new Date();

  var formatedTime =
(date.getHours()<10?'0'+date.getHours():date.getHours()) +
              ':' +
(date.getMinutes()<10?'0'+date.getMinutes():date.getMinutes());

  document.getElementById('time').value = formatedTime;
}

//sprawdzenie poprawnosci daty po kliknieciu gdzies indziej
document.getElementById('date').addEventListener('blur', function() {
  var date = document.getElementById('date').value;
  var date2 = new Date(date);
  if(date2 == 'Invalid Date') actualDate();
});

document.getElementById('time').addEventListener('blur', function() {
  var time = document.getElementById('time').value;

  var pattern = new RegExp("^(([0-1][0-9])|(2[0-3])):[0-5][0-9]$");

  if(!pattern.test(time)) actualTime();
});


document.addEventListener('DOMContentLoaded', function(event) {
  actualDate();
  actualTime();
});