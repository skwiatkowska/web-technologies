{\rtf1\ansi\ansicpg1250\deff0\nouicompat\deflang1045{\fonttbl{\f0\fnil\fcharset0 Calibri;}}
{\*\generator Riched20 10.0.17134}\viewkind4\uc1 
\pard\sa200\sl276\slmult1\f0\fs22\lang21 <?php\par
//w communicator.js z metodzie pullChatData mamy:   xmlhttp.open('GET', 'poll.php?timestamp=' + timestamp, true);\par
\par
set_time_limit(0); //czas oczekiwania do wykonania skryptu\par
\par
$data_source_file = "communicator.db";\par
\par
while (true) \{\par
  //sprawdzenie czy ustawiono timestamp, inaczej 0\par
  $last_ajax_call = isset($_GET["timestamp"]) ? (int)$_GET["timestamp"] : 0;\par
\par
  //czyszczenie bufora z daty modyfikacji pliku\par
  clearstatcache();\par
  //pobranie czasu ostatniej modyfikacji\par
  $last_change_in_data_file = filemtime($data_source_file);\par
  //sprawdzenie czy przekroczono czas i trzeba pobrac nowe dane\par
  if ($last_change_in_data_file > $last_ajax_call) \{\par
        $handle = fopen("communicator.db","r+");\par
\par
        if(flock($handle, LOCK_EX)) \{\par
                $data = fread($handle, filesize("communicator.db"));\par
                fflush($handle);\par
                flock($handle, LOCK_UN);\par
                \}\par
\par
        fclose($handle);\par
\par
      //odeslanie danych z powrotem-zawartosci bazy i czasu ostatniej modyfikacji\par
      $result = array(\par
          "data" => ($data == false ? "" : $data),\par
          "timestamp" => $last_change_in_data_file\par
      );\par
\par
      $json = json_encode($result);\par
      echo $json;\par
\par
      break;\par
  \} else \{\par
    //zaczekaj minute i sprawdz czy juz trzeba wyslac dane\par
    sleep(1);\par
  \}\par
\}\par
?>\par
}
 