{\rtf1\ansi\ansicpg1250\deff0\nouicompat\deflang1045{\fonttbl{\f0\fnil\fcharset0 Calibri;}{\f1\fnil\fcharset238 Calibri;}}
{\colortbl ;\red0\green0\blue255;}
{\*\generator Riched20 10.0.17134}\viewkind4\uc1 
\pard\sa200\sl276\slmult1\f0\fs22\lang21 <?php\par
if(!isset($_POST["submit"])) \{\par
        header("Location: blog.php");\par
        exit();\par
\}\par
?>\par
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"\par
        "{{\field{\*\fldinst{HYPERLINK http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd }}{\fldrslt{http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd\ul0\cf0}}}}\f0\fs22 ">\par
\par
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">\par
<head>\par
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>\par
        <title>Nowy komentarz</title>\par
        <link rel="stylesheet" href="default.css" type="text/css" title="Default" />\par
        <link rel="alternate stylesheet" href="additional.css" type="text/css" title="Additional" />\par
</head>\par
<body>\par
        <?php include 'menu.php'; ?>\par
<?php\par
         //sprawdzenie, czy uzupelniono wszystkie pola\par
         $fields = array('comment_type', 'content', 'author', 'wpis_id');\par
\par
         $error = false;\par
         foreach($fields as $fieldname) \{\par
                if(!isset($_POST[$fieldname]) || empty($_POST[$fieldname])) \{\par
                        $error = true;\par
                \}\par
         \}\par
\par
         if($error) \{\par
                echo "<h1>B\f1\'b3\'b9d przy dodawaniu komentarza.</h1>";\par
                echo "<p>Uzupe\'b3nij wszystkie pola formularza</p>";\par
                exit();\par
         \}\par
\par
         //szukanie odpowiedniego bloga\par
         foreach(glob('./*', GLOB_ONLYDIR) as $dir) \{\par
                $dirname = basename($dir);\par
\par
             $files = array_diff(scandir($dirname), array('.', '..', 'info'));\par
                foreach ($files as $file) \{\par
                        //odpowiedni post\par
                        if($file === $_POST['wpis_id']) \{\par
\par
                                //stworzenie folderu z komentarzami jesli nie istnieje\par
            $semRes = sem_get( 1111, 1, 0666, 0);\par
            if (sem_acquire($semRes)) \{\par
\par
          if(!file_exists($dirname . '/' . $_POST['wpis_id'] . '.k')) \{\par
                   mkdir($dirname . '/' . $_POST['wpis_id'] . '.k', 0755, true);\par
                 \}\par
\par
                                //wyznaczenie numeru komentarza\par
                 $counter = 0;\par
                 while(file_exists($dirname . '/' . $_POST['wpis_id'] . '.k/' . $counter)) \{\par
                                        $counter++;\par
                                \}\par
                                //tworzenie pliku z komentarzem\par
                 $myfile = fopen($dirname . '/' . $_POST['wpis_id'] . '.k' . '/' . $counter, "w");\par
\par
                                //zapis danych do pliku\par
                                if($myfile) \{\par
                  fwrite($myfile, $_POST['comment_type'] . "\\n");\par
                  date_default_timezone_set('Europe/Warsaw');\par
                  $date = date('Y-m-d, H:i:s');\par
                  fwrite($myfile, $date . "\\n");\par
                  fwrite($myfile, $_POST['author'] . "\\n");\par
                  fwrite($myfile, $_POST['content']);\par
                                \}\par
\par
\par
                                echo "<h1>Dodano nowy komentarz</h1>";\par
\par
                 fclose($myfile);\par
sem_release($semRes);\par
\}\par
               \}\par
                \}\par
         \}\par
         ?>\par
      <script src="style.js" type="text/javascript"></script>\par
\par
</body>\par
</html>\f0\par
}
 