<form action="/music_genre/create" method="post">

<div class="modal fade" id="form_add_genre" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h3 class="modal-title" id="modalLabel">Criar <?= $title; ?></h3>
            </div>
            <div class="modal-body">
                <div class="form-group">
                        <input name="genero" type="text" value="Gênero"
                               class="form-control"
                               onfocus="if (this.value == 'Gênero') {this.value = '';}"
                               onblur="if (this.value == 'Gênero') {this.value = 'Gênero';}"
                               required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Salvar</button>
            </div>
        </div>
    </div>
</div>

</form>
