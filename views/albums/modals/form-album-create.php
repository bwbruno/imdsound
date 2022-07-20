<form action="/album/create" method="post" enctype="multipart/form-data">

<div class="modal fade" id="form_add_album" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h3 class="modal-title" id="modalLabel">Criar álbum</h3>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="name" class="control-label">Nome:</label>
                    <input name="name" type="text" value="Nome"
                           class="form-control"
                           onfocus="if (this.value == 'Nome') {this.value = '';}"
                           onblur="if (this.value == '') {this.value = 'Nome';}"
                           required>
                </div>
                <div class="form-group">
                    <span class="control-fileupload">
                      <label for="file">Capa:</label>
                      <input name="image" type="file" id="file">
                    </span>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Salvar</button>
            </div>
        </div>
    </div>
</div>

</form>
