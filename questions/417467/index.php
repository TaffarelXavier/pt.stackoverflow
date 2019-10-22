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