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
        <title>Nowy komentarz - formularz</title>\par
        <link rel="stylesheet" href="default.css" type="text/css"\par
title="Default" />\par
        <link rel="alternate stylesheet" href="additional.css"\par
type="text/css" title="Additional" />\par
</head>\par
<body>\par
        <?php include 'menu.php'; ?>\par
        <h1>Nowy komentarz</h1>\par
  <form action="koment.php" method="post">\par
\par
                <label for="comment_type">Rodzaj komentarza:</label><br\par
/>\par
                <select id="comment_type" name="comment_type">\par
                        <option value="pozytywny">Pozytywny</option>\par
                        <option value="negatywny">Negatywny</option>\par
                        <option value="neutralny">Neutralny</option>\par
                </select><br />\par
\par
                <label for="content">Komentarz:</label><br />\par
                <textarea id="content" name="content" cols="60"\par
rows="5"></textarea><br />\par
\par
                <label for="author">Autor:</label><br />\par
          <input id="author" type="text" name="author" /><br />\par
\par
    <input name="wpis_id" type="hidden" value="<?php echo\par
$_POST['wpis_id']; ?>">\par
\par
          <input type="submit" name="submit" value="Wy\f1\'9clij">\par
          <input type="reset" value="Wyczy\'9c\'e6">\par
        </form>\par
\par
        <script src="style.js" type="text/javascript"></script>\par
</body>\par
</html>\f0\par
}
 