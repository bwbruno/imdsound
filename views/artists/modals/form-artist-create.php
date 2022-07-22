<form action="/artist/create" method="post" enctype="multipart/form-data">

<div class="modal fade" id="form_add_artist" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h3 class="modal-title" id="modalLabel">Criar artista</h3>
            </div>
            <div class="modal-body">
                <input name="email" type="hidden" required>
                <div class="form-group">
                    <label for="name" class="control-label">Nome artístico:</label>
                    <input name="name" type="text" value="Nome"
                           class="form-control"
                           onfocus="if (this.value == 'Nome') {this.value = '';}"
                           onblur="if (this.value == '') {this.value = 'Nome';}"
                           required>
                </div>
                <div class="form-group">
                    <label for="descricao" class="control-label">Descrição:</label>
                    <textarea name="descricao" class="form-control" id="textarea" rows="3"
                              onfocus="if (this.value == 'Descrição') {this.value = '';}"
                              onblur="if (this.value == '') {this.value = 'Descrição';}"
                              required>Descrição</textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Salvar</button>
            </div>
        </div>
    </div>
</div>

</form>
