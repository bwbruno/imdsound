<div class="modal fade" id="myModal5" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-info">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body modal-spa">
                <div class="sign-grids">
                    <div class="sign">
                        <div class="sign-right">
                            <form action="/user/create" method="post">

                                <h3>Crie sua conta </h3>
                                <input name="name" type="text" value="Nome" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Name';}" required>
                                <input name="email" type="email" value="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" required>
                                <input name="password" type="password" value="Senha" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}" required>
                                <input name="country" type="text" value="Pais" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Country';}" required>
                                <input name="phone_number" type="text" value="Telefone" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Phone_number';}" required>

                                <input type="submit" value="CRIAR CONTA" >
                            </form>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <p>Ao inscrever-se você está concordando com nossos <span>Termos e Condições</span> e <span>Política de Privacidade</span></p>
                </div>
            </div>
        </div>
    </div>
</div>