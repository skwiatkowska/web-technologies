{\rtf1\ansi\ansicpg1250\deff0\nouicompat\deflang1045{\fonttbl{\f0\fnil\fcharset0 Calibri;}}
{\*\generator Riched20 10.0.17134}\viewkind4\uc1 
\pard\sa200\sl276\slmult1\f0\fs22\lang21\par
<?php\par
//communicator.js:     xmlhttp.open('GET', 'poll_add.php?user_name='+userName+'&content='+commentContent, true);\par
\par
$max = 7;\par
\par
$handle = fopen("communicator.db","r+");\par
\par
if(flock($handle, LOCK_EX)) \{\par
\par
    //zliczanie wierszy w bazie\par
    $linecount = 0;\par
    while(!feof($handle))\{\par
      fgets($handle);\par
      $linecount++;\par
    \}\par
\par
    //cofniecie wskaznika na poczatek\par
    rewind($handle);\par
\par
    //jesli wierszy w bazie jest wiecej niz max, nie wyswietlamy najstarszych\par
    while($linecount > $max) \{\par
      //pobranie tresci bazy do $data\par
      $data = fread($handle, filesize("communicator.db"));\par
\par
      //powrot na poczatek, wyczyszczenie pliku\par
      rewind($handle);\par
      file_put_contents("communicator.db", "");\par
\par
      //usuniecie pierwszej linii w zmiennej $data\par
      $data = substr($data, strpos($data, "\\n") + 1);\par
\par
      //dodanie nowej tresci z bazy do pliku\par
      file_put_contents("communicator.db", $data);\par
\par
      $linecount--;\par
    \}\par
\par
    //przejscie na koniec\par
    while(!feof($handle))\{\par
      fgets($handle);\par
    \}\par
\par
    //dodanie nowej wiadomosci\par
    fwrite($handle, $_GET["user_name"] . ": " . $_GET["content"] .\par
"\\n");\par
    fflush($handle);\par
    flock($handle, LOCK_UN);\par
\}\par
\par
fclose($handle);\par
\par
?>\par
}
 