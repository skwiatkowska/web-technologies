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
        <title>Nowy wpis</title>\par
        <link rel="stylesheet" href="default.css" type="text/css" title="Default" />\par
        <link rel="alternate stylesheet" href="additional.css" type="text/css" title="Additional" />\par
</head>\par
<body>\par
        <?php include 'menu.php'; ?>\par
<?php\par
$fields = array('user_name', 'password', 'content', 'date', 'time');\par
\par
         $error = false;\par
         foreach($fields as $fieldname) \{\par
                if(!isset($_POST[$fieldname]) || empty($_POST[$fieldname])) \{\par
                        $error = true;\par
                \}\par
         \}\par
        if($error) \{\par
                echo "<h1>Wpis okaza\f1\'b3 si\'ea niemo\'bfliwy!</h1>";\par
                echo "<p>Uzupe\'b3nij wszystkie pola formularza!</p>";\par
                exit();\par
         \}\par
foreach(glob('./*', GLOB_ONLYDIR) as $dir) \{\par
                $dirname = basename($dir);\par
                $handle = fopen($dirname . "/" . "info", "r");\par
\par
if($handle && !$error) \{\par
                        $owner = fgets($handle);\par
                        $owner = trim($owner);\par
                        $password = fgets($handle);\par
                        $password = trim($password);\par
\par
if($owner === $_POST['user_name'] && $password === md5($_POST['password'])) \{\par
                                //stworzenie odpowiedniej nazwy wpisu z daty i czasu\par
                                $date = str_replace("-","",$_POST['date']);\par
                                $time = str_replace(":","",$_POST['time']);\par
                                $file_name = $dirname . "/" . $date . $time . date("s");\par
                                //numer unikalny UU\par
                                $counter = 0;\par
                                while(file_exists($file_name . sprintf('%02d', $counter))) \{\par
                                        $counter = $counter + 1;\par
                                \}\par
                                $file_name = $file_name . sprintf('%02d', $counter);\par
                                $myfile = fopen($file_name, "w");\par
                                fwrite($myfile, $_POST['content']);\par
                                fclose($myfile);\par
\par
\par
                                for($it = 1; $it <= sizeof($_FILES); $it++) \{\par
                                        if($_FILES["fileToUpload" . $it]['name'] == "") \{\par
                                                continue;\par
                                        \}\par
\par
                                        $target_file = basename($_FILES["fileToUpload" . $it]["name"]);\par
                                        $extension = "";\par
                                        $i = 0;\par
                                        for ($i = 0; $i < strlen($target_file); $i++)\{\par
                                        if($target_file[$i] == ".") break;\par
                                        \}\par
                                        $i++;\par
                                        for (; $i < strlen($target_file); $i++)\{\par
                                        $extension = $extension . $target_file[$i];\par
                                        \}\par
                                        $target_file = $file_name . $it . "." . $extension;\par
\par
\par
                                        $uploadOk = 1;\par
                                        if (file_exists($target_file)) \{\par
                                            $uploadOk = 0;\par
                                        \}\par
\par
                                        if ($uploadOk == 1) \{\par
\par
                                            if (move_uploaded_file($_FILES["fileToUpload" . $it]["tmp_name"], $target_file)) \{\par
                                                // echo "The file ". basename( $_FILES["fileToUpload" . $it]["name"]). " has been uploaded.";\par
                                            \} else \{\par
                                                // echo "Sorry, there was an error uploading your file.";\par
                                            \}\par
                                        \}\par
                                \}\par
                        echo "<h1>Dodano nowy wpis na blogu!</h1>";\par
       \}\par
  \}\par
fclose($file);\par
\}\par
\par
\par
?>\par
\par
\par
<script src="style.js" type="text/javascript"></script>\par
</body>\par
</html>\f0\par
}
 