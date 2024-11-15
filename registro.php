<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Registro</title>
    <link rel="stylesheet" href="resgistro.css">
</head>
<body>

<div class="container">
    <h2>Dados Pessoais</h2>
    <form id="registrationForm" onsubmit="validateForm(event)">
        <div class="input-group">
            <label for="name">Nome *</label>
            <input type="text" id="name" name="name">
            <div class="error" id="nameError">O nome deve ter no mínimo 3 caracteres e conter apenas letras.</div>
        </div>

        <div class="input-group">
            <label for="gender">Sexo *</label>
            <select id="gender" name="gender">
                <option value="Masculino">Masculino</option>
                <option value="Feminino">Feminino</option>
            </select>
        </div>

        <div class="input-group">
            <label for="dob">Data de Nascimento *</label>
            <input type="date" id="dob" name="dob">
            <div class="error" id="dobError">A data de nascimento é obrigatória.</div>
        </div>

        <div class="input-group">
            <label for="email">Email *</label>
            <input type="email" id="email" name="email">
            <div class="error" id="emailError">O email deve ser válido (exemplo@dominio.com).</div>
        </div>

        <div class="input-group">
            <label for="password">Senha *</label>
            <input type="password" id="password" name="password">
            <div class="error" id="passwordError">A senha deve ter no mínimo 8 caracteres, incluindo pelo menos 1 número e 1 letra.</div>
        </div>

        <div class="input-group">
            <label for="confirmPassword">Confirmar Senha *</label>
            <input type="password" id="confirmPassword" name="confirmPassword">
            <div class="error" id="confirmPasswordError">As senhas não coincidem.</div>
        </div>

        <div class="show-password">
            <input type="checkbox" id="showPassword" onclick="togglePasswordVisibility()"> Mostrar senha
        </div>

        <button type="submit" class="submit-btn">Finalizar Cadastro</button>
    </form>
</div>

<script>
    function validateForm(event) {
        event.preventDefault();

        let isValid = true;

        // Nome validation
        const name = document.getElementById('name').value;
        const nameError = document.getElementById('nameError');
        if (!/^[A-Za-z]{3,}$/.test(name)) {
            nameError.style.display = 'block';
            isValid = false;
        } else {
            nameError.style.display = 'none';
        }

        // Data de nascimento validation
        const dob = document.getElementById('dob').value;
        const dobError = document.getElementById('dobError');
        if (!dob) {
            dobError.style.display = 'block';
            isValid = false;
        } else {
            dobError.style.display = 'none';
        }

        // Email validation
        const email = document.getElementById('email').value;
        const emailError = document.getElementById('emailError');
        if (!/^[\w-.]+@[\w-]+\.[a-z]{2,4}(\.[a-z]{2,4})?$/.test(email)) {
            emailError.style.display = 'block';
            isValid = false;
        } else {
            emailError.style.display = 'none';
        }

        // Senha validation
        const password = document.getElementById('password').value;
        const passwordError = document.getElementById('passwordError');
        if (!/(?=.*[0-9])(?=.*[A-Za-z]).{8,}/.test(password)) {
            passwordError.style.display = 'block';
            isValid = false;
        } else {
            passwordError.style.display = 'none';
        }

        // Confirmar Senha validation
        const confirmPassword = document.getElementById('confirmPassword').value;
        const confirmPasswordError = document.getElementById('confirmPasswordError');
        if (password !== confirmPassword) {
            confirmPasswordError.style.display = 'block';
            isValid = false;
        } else {
            confirmPasswordError.style.display = 'none';
        }

        if (isValid) {
            alert('Cadastro realizado com sucesso!');
            document.getElementById('registrationForm').reset();
        }
    }

    function togglePasswordVisibility() {
        const password = document.getElementById('password');
        const confirmPassword = document.getElementById('confirmPassword');
        if (document.getElementById('showPassword').checked) {
            password.type = 'text';
            confirmPassword.type = 'text';
        } else {
            password.type = 'password';
            confirmPassword.type = 'password';
        }
    }
</script>

</body>
</html>
