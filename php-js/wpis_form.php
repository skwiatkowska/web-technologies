{\rtf1\ansi\ansicpg1250\deff0\nouicompat\deflang1045{\fonttbl{\f0\fnil\fcharset0 Calibri;}{\f1\fnil\fcharset238 Calibri;}}
{\colortbl ;\red0\green0\blue255;}
{\*\generator Riched20 10.0.17134}\viewkind4\uc1 
\pard\sa200\sl276\slmult1\f0\fs22\lang21 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"\par
        "{{\field{\*\fldinst{HYPERLINK http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd }}{\fldrslt{http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd\ul0\cf0}}}}\f0\fs22 ">\par
\par
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">\par
<head>\par
        <meta http-equiv="Content-Type" content="text/html;\par
charset=utf-8"/>\par
        <title>Nowy wpis - formularz</title>\par
        <link rel="stylesheet" href="default.css" type="text/css"\par
title="Default" />\par
        <link rel="alternate stylesheet" href="additional.css"\par
type="text/css" title="Additional" />\par
</head>\par
<body>\par
        <?php include 'menu.php'; ?>\par
        <h1>Nowy wpis</h1>\par
        <form action="wpis.php" method="post"\par
enctype="multipart/form-data">\par
                <label for="user_name">Nazwa u\f1\'bfytkownika:</label><br />\par
                <input type="text" id="user_name" name="user_name" /><br\par
/>\par
\par
                <label for="password">Has\'b3o u\'bfytkownika:</label><br\par
/>\par
                <input type="password" id="password" name="password"\par
/><br />\par
\par
                <label for="content">Wpis:</label><br />\par
                <textarea id="content" name="content" cols="60"\par
rows="5"></textarea><br />\par
\par
                <label for="date">Data:</label><br />\par
                <input type="text" id="date" name="date" value=""/><br>\par
                <?php //echo date("Y-m-d");?>\par
                <!--\par
pattern="(?:19|20)[0-9]\{2\}-(?:(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])-(?:30))|(?:(?:0[13578]|1[02])-31))"\par
-->\par
\par
                <label for="time">Godzina:</label><br />\par
                <input type="text" id="time" name="time" /><br>\par
                <!-- pattern="(0[0-9]|1[0-9]|2[0-3])(:[0-5][0-9])" -->\par
\par
                <input type="file" name="fileToUpload1"\par
onchange="addChooser(1)" /><br />\par
\par
                <!-- <input type="button" value="Kolejny plik"\par
id="nextFile"><br /> -->\par
\par
                <input id="submit" type="submit" name="submit"\par
value="Wy\'9clij">\par
                <input type="reset" value="Wyczy\'9c\'e6">\par
        </form>\par
\par
        <script src="wpis_autohelp.js" type="text/javascript"></script>\par
        <script src="style.js" type="text/javascript"></script>\par
</body>\par
</html>\f0\par
}
 