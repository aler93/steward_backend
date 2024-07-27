<div class="row">
    <div class="col-lg-4 col-md-12 mb-3">
        <div class="card border border-primary">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Login</h5>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="email" class="form-label">E-mail</label>
                    <input type="email" class="form-control" id="email" placeholder="name@example.com">
                </div>
                <div class="mb-3">
                    <label for="senha" class="form-label">Senha</label>
                    <input type="password" class="form-control" id="senha" placeholder="">
                </div>
            </div>
            <div class="card-footer text-center">
                <button id="btn-login" class="btn btn-success">
                    Login
                </button>
            </div>
        </div>
    </div>

    <div class="col-lg-8 col-md-12">
        <div class="card border border-secondary">
            <div class="card-header bg-secondary text-white">
                <h5 class="mb-0">Criar conta</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="mb-3">
                            <label for="new_email" class="form-label">E-mail</label>
                            <input type="email" class="form-control" id="new_email" placeholder="name@example.com"
                                   value="example@mail.com">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="mb-3">
                            <label for="new_senha" class="form-label">Senha</label>
                            <input type="password" class="form-control" id="new_senha" placeholder="" min="6"
                                   value="12345678">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-3">
                            <label for="new_nome" class="form-label">Nome</label>
                            <input type="text" class="form-control" id="new_nome" placeholder="" value="João Exemplo">
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer text-end">
                <button id="btn-criar-conta" class="btn btn-success">
                    Criar conta
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $("#btn-criar-conta").on("click", function () {
            let body = {
                email: $("#new_email").val(),
                password: $("#new_senha").val(),
                perfil: {
                    nome: $("#new_nome").val()
                }
            }

            axios.post("/api/user", body).then(function (r) {
                console.log(r)
                let body = {
                    email: $("#new_email").val(),
                    password: $("#new_senha").val(),
                }

                axios.post("/api/login", body).then(function (r) {
                    console.log(r.data)
                    localStorage.setItem("jwt", r.data.access_token)
                    localStorage.setItem("jwt_expires_at", r.data.expires_at)
                })
            }).catch( function(err) {
                console.log(err)

                Swal.fire({
                    title: 'Ocorreu um erro',
                    text: err.data.message,
                    icon: 'error',
                })
            } )
        })

        $("#btn-login").on("click", function () {
            let body = {
                email: $("#email").val(),
                password: $("#senha").val(),
            }

            axios.post("/api/login", body).then(function (r) {
                console.log(r.data)
                localStorage.setItem("jwt", r.data.access_token)
                localStorage.setItem("jwt_expires_at", r.data.expires_at)
            }).catch( function(err) {
                console.log(err)

                Swal.fire({
                    title: 'Login incorreto',
                    text: 'Usuário ou senha incorreto',
                    icon: 'error',
                })
            } )
        })
    })
</script>
