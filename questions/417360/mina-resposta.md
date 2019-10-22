https://pt.stackoverflow.com/questions/417467/post-n%c3%a3o-recebendo-input-do-form/417472#417472

Você deve encontrar a entrada do tipo file, no seu caso, imagens, usando a matriz global $_FILES, não $_POST.

Veja esta página para mais embasamento:
https://www.php.net/manual/pt_BR/features.file-upload.post-method.php
https://www.php.net/manual/pt_BR/reserved.variables.files.php

DEMO:

index_test.php:

<form action="createsubmit.php" method="post" enctype="multipart/form-data">
        <div class="col-sm-8">
        <div class="form-group row">
            <div class="custom-file">
                 <input type="file" name="pic" accept="image/*" id="customFile" required>
                 <label class="custom-file-label" for="customFile">Choose an Image</label>
            </div>
        </div>
        </div>
                <div class="col-sm-8"> 
        <div class="form-group row">
            <label for="colFormLabel" class="col-sm-0 col-form-label"></label>
                <input type="text" name="author" class="form-control" id="colFormLabel" placeholder="Autor" required>
            </div>
        </div>
        <button>Enviar</button>
</form>
createsubmit.php:

<?php
var_dump($_POST);
var_dump($_FILES);
var_dump($_FILES['pic']);
Saída:

etc\createsubmit.php:4:
array (size=1)
  'author' => string 'adfasd' (length=6)
etc\createsubmit.php:5:
array (size=1)
  'pic' => 
    array (size=5)
      'name' => string 'img077.jpg' (length=10)
      'type' => string 'image/jpeg' (length=10)
      'tmp_name' => string 'C:\wamp64\tmp\php4CF9.tmp' (length=25)
      'error' => int 0
      'size' => int 1611653
etc\createsubmit.php:6:
array (size=5)
  'name' => string 'img077.jpg' (length=10)
  'type' => string 'image/jpeg' (length=10)
  'tmp_name' => string 'C:\wamp64\tmp\php4CF9.tmp' (length=25)
  'error' => int 0
  'size' => int 1611653