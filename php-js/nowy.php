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
        <meta http-equiv="Content-Type" content="text/html;\par
charset=utf-8"/>\par
        <title>Nowy Blog</title>\par
        <link rel="stylesheet" href="default.css" type="text/css"\par
title="Default" />\par
        <link rel="alternate stylesheet" href="additional.css"\par
type="text/css" title="Additional" />\par
</head>\par
<body>\par
        <?php include 'menu.php'; ?>\par
\par
        <?php\par
\par
                $fields = array('blog_name', 'user_name', 'password',\par
'description');\par
\par
                $error = false;\par
                foreach($fields as $fieldname) \{\par
                        if(!isset($_POST[$fieldname]) ||\par
empty($_POST[$fieldname])) \{\par
                                $error = true;\par
                        \}\par
                \}\par
\par
                if($error) \{\par
                        echo "<h1>Za\f1\'b3o\'bfenie bloga okaza\'b3o si\'ea\par
niemo\'bfliw<</h1>";\par
                        echo "<p>Uzupe\'b3nij wszystkie pola\par
formularza</p>";\par
                        exit();\par
                \}\par
\par
                $name = $_POST['blog_name'];\par
\par
                $files = array_diff(scandir('./'), array('.', '..'));\par
                foreach ($files as $file) \{\par
                        if(substr($file, -4) == ".php") continue;\par
                        if(substr($file, -4) == ".css") continue;\par
                        $handle = fopen($file . "/info", "r");\par
                        if(trim(fgets($handle)) == $_POST['user_name'])\par
\{\par
                                echo "<h1>Za\'b3o\'bfenie bloga okaza\'b3o\par
si\'ea niemo\'bfliwe</h1>";\par
                                echo "<p>Istnieje ju\'bf u\'bfytkownik o\par
podanej nazwie.</p>";\par
                                fclose($handle);\par
                                exit();\par
                        \}\par
                        fclose($handle);\par
                \}\par
        $semRes = sem_get( 1111, 1, 0666, 0);\par
    if (sem_acquire($semRes)) \{\par
                if (!file_exists($name)) \{\par
                        mkdir($name, 0755, true);\par
                \} else \{\par
                        echo "<h1>Za\'b3o\'bfenie bloga okaza\'b3o si\'ea\par
niemo\'bfliwe</h1>";\par
                        echo "<p>Istnieje ju\'bf blog o podanej\par
nazwie.</p>";\par
                        exit();\par
                \}\par
\par
                $myfile = fopen($name . "/" . "info", "w");\par
\par
                fwrite($myfile, $_POST['user_name'] . "\\n");\par
\par
                fwrite($myfile, md5($_POST['password']) . "\\n");\par
\par
                fwrite($myfile, $_POST['description']);\par
                fclose($myfile);\par
        sem_release($semRes);\par
    \}\par
\par
                echo "<h1> Blog '" . $name . "' zosta\'b3\par
za\'b3o\'bfony!</h1>";\par
        ?>\par
\par
        <script src="style.js" type="text/javascript"></script>\par
</body>\par
</html>\f0\par
}
 