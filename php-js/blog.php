{\rtf1\ansi\ansicpg1250\deff0\nouicompat\deflang1045{\fonttbl{\f0\fnil\fcharset0 Calibri;}{\f1\fnil\fcharset238 Calibri;}}
{\colortbl ;\red0\green0\blue255;}
{\*\generator Riched20 10.0.17134}\viewkind4\uc1 
\pard\sa200\sl276\slmult1\f0\fs22\lang21 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"\par
   "{{\field{\*\fldinst{HYPERLINK http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd }}{\fldrslt{http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd\ul0\cf0}}}}\f0\fs22 ">\par
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">\par
   <head>\par
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>\par
      <title>Blog</title>\par
      <link rel="stylesheet" href="default.css" type="text/css" title="Default" />\par
      <link rel="alternate stylesheet" href="additional.css" type="text/css" title="Additional" />\par
   </head>\par
   <body>\par
      <?php include 'menu.php'; ?>\par
      <?php\par
         //jesli nie wybrano, wyswietla wszystkie dostepne\par
         if(!isset($_GET["nazwa"]) || empty($_GET["nazwa"])) \{\par
           echo "<br/><h1>BLOGI</h1>";\par
           echo "<ul>";\par
\par
           //lista blogow\par
           foreach(glob('./*', GLOB_ONLYDIR) as $dir) \{\par
                $dirname = basename($dir);\par
             echo'<li><a href="blog.php?nazwa=' . $dirname . '">' . $dirname . '</li></a>';\par
         echo "<p>Opis bloga `$dirname`: ";\par
         $handle = fopen($dirname . "/info", "r");\par
         $tmp = fgets($handle);//login\par
         $tmp = fgets($handle);//haslo\par
         while(! feof($handle)) \{ //pobiera caly opis\par
                echo fgets($handle);\par
         \}\par
         fclose($handle);\par
           \}\par
\par
           echo "</ul><br/>";\par
         \}\par
\par
else\{\par
\par
           //blog istnieje\par
           if(file_exists($_GET["nazwa"])) \{\par
             echo "<h1>" . $_GET["nazwa"] . "</h1>";\par
$files=array_diff(scandir($_GET["nazwa"]),array('.','..','info'));\par
        foreach($files as $file)\{\par
        if(strpos($file,".")!==false)continue; //odrzuca folder z komentarzami\par
        $handle=fopen($_GET["nazwa"]."/".$file,"r");\par
        echo'<div class="blog-post">';\par
        echo"<h2>Wpis:</h2>";\par
        echo'<p>';\par
        while(!feof($handle))\{ //pobranie tresci wpisu\par
        echo fgets($handle);\par
        \}\par
        echo'</p>';\par
        fclose($handle);\par
\par
        $uploadedFiles=array_diff(scandir($_GET["nazwa"]),array('.','..','info'));\par
        echo"<h3>Pliki:</h3>";\par
foreach($uploadedFiles as $upload)\{\par
        if(strpos($upload,".")===false)continue;\par
        if(substr($upload,-2)==".k")continue;\par
        $uploadName=substr($upload,0,16);\par
        if($uploadName==$file)\{\par
        $uploadPath=$_GET["nazwa"].'/'.$upload; //link do zalacznika\par
        echo'<a href="'.$uploadPath.'">LINK</a>'."<br />";\par
        \}\par
        \}\par
\par
//Wypisywanie komentarzy\par
        echo"<h3>Komentarze:</h3>";\par
        $comments=array_diff(scandir($_GET["nazwa"]."/".$file.".k"),array('.','..','info'));\par
foreach($comments as $comment)\{\par
        $handle=fopen($_GET["nazwa"]."/".$file.".k/".$comment,"r");\par
        echo"<p>Rodzaj: ".fgets($handle)."</p>"; //Rodzaj\par
        echo"<p>Data oraz godzina: ".fgets($handle)."</p>"; // Godzina i data\par
        echo"<p>Autor: ".fgets($handle)."</p>"; // Autor\par
        echo"<p>Tre\f1\'9c\'e6: ";\par
        while(!feof($handle))\{ //tresc komentarza\par
        echo fgets($handle);\par
        \}\par
        echo"</p>";\par
        echo"<hr />";\par
        fclose($handle);\par
        \}\par
\par
echo <<<_END\par
                <form action="koment_form.php" method="post">\par
                <input name="wpis_id" type="hidden" value="$file">\par
                <input type="submit" name="submit" value="Dodaj komentarz">\par
                </form>\par
_END;\par
echo"</div>";\par
\}\par
\par
\}\par
else\{\par
        echo"<h1>Nie znaleziono szukanego bloga</h1>";\par
        echo'<a href="blog.php">Zobacz dost\'eapne blogi</a>';\par
        \}\par
\par
\par
\}\par
 ?>\par
      <form id="communicator">\par
         <fieldset>\par
            <legend>Komunikator</legend>\par
            <label for="activated">Aktywuj komunikator:</label>\par
            <input type="checkbox" id="activated" /><br /><br />\par
            <textarea id="communicatorText" readonly="true" cols="60" rows="10"></textarea>\par
            <br /><br />\par
            <label for="user_name">Nazwa u\'bfytkownika:</label>\par
            <input type="text" id="user_name" /><br />\par
            <label for="content">Tre\'9c\'e6 komunikatu:</label>\par
            <input type="text" id="content" /><br /><br />\par
            <input type="submit" value="Wy\'9clij" />\par
         </fieldset>\par
      </form>\par
      <script src="communicator.js" type="text/javascript"></script>\par
      <script src="style.js" type="text/javascript"></script>\par
   </body>\par
</html>\f0\par
}
 