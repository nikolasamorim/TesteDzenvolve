

//      VALIDACAO TELA DE CADASTRO
function validar(){
    /* Variaveis */
        var nome = formulario.nome;
        var email = formulario.email;
        var telefone = formulario.telefone;
        var senha = formulario.senha;
        var data_nasc = formulario.data_nasc;
     // verificar se o nome está vazio
        if (nome.value == "") {
        alert("Nome não informado");
    
        // Deixa o input com o foco
            nome.focus();
        // retorna a função e não olha as outras linhas
            return;
        }else if (email.value == "") {
        alert("E-mail não informado"); //Alerta de erro email
            email.focus();
            return;
        }else if (telefone.value == "") {
        alert("Telefone não informado"); //Alerta de erro telefone
            telefone.focus();
            return;
        }else if (senha.value == "") {
        alert("Senha não informada"); //Alerta de erro senha
            senha.focus();
            return;
        }else if (data_nasc.value == "") {
            alert("Data de nascimento não informada"); //Alerta de erro data de nascimento
                data_nasc.focus();
                return;
            }else{
                alert(`Preenchido com sucesso! `); //Alerta de sucesso de registro
                return;
                }
                
    }

//           VALIDACAO TELA DE ALTERAÇÃO
    function validarALT(){
        /* Variaveis */
            var nome = formulario.nome;
            var email = formulario.email;
            var telefone = formulario.telefone;
            var senha = formulario.senha;
            var data_nasc = formulario.data_nasc;
         // verificar se o nome está vazio
            if (nome.value == "") {
            alert("Nome não informado");
        
            // Deixa o input com o foco
                nome.focus();
            // retorna a função e não olha as outras linhas
                return;
            }else if (email.value == "") {
            alert("E-mail não informado"); //Alerta de erro email
                email.focus();
                return;
            }else if (telefone.value == "") {
            alert("Telefone não informado"); //Alerta de erro telefone
                telefone.focus();
                return;
            }else if (senha.value == "") {
            alert("Senha não informada, digite uma senha de no mínimo 6 dígitos"); //Alerta de erro senha
                senha.focus();
                return;
            }else if (data_nasc.value == "") {
                alert("Data de nascimento não informada"); //Alerta de erro data de nascimento
                    data_nasc.focus();
                    return;
                }else{
                    alert(`Alterado com sucesso! `); //Alerta de sucesso de alteração
                    return;
                    }
                    
        }














