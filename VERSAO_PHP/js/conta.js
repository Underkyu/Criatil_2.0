let imagem = document.getElementById('img-container');
let input = document.getElementById('imagem_file');

imagem.addEventListener('click', () => {
    input.click();
});

// código dos formulários de editar perfil e atualizar senha
document.addEventListener("DOMContentLoaded", function() {
    const botaoEditarPerfil = document.getElementById('btnEditarPerfil');
    const botaoAtualizarSenha = document.getElementById('btnAtualizarSenha');
    const formEditarPerfil = document.getElementById('formEditarPerfil');
    const formAtualizarSenha = document.getElementById('formAtualizarSenha');

    formEditarPerfil.style.display = 'none';
    formAtualizarSenha.style.display = 'none';

    // editar perfil
    botaoEditarPerfil.addEventListener('click', function() {
        if (formEditarPerfil.style.display === "none" || formEditarPerfil.style.display === "") {
            formEditarPerfil.style.display = "flex";
            formEditarPerfil.classList.add('fade-in'); 
            formAtualizarSenha.style.display = 'none'; // Esconde o formulário de atualizar senha
        } else {
            formEditarPerfil.classList.remove('fade-in'); 
            setTimeout(() => {
                formEditarPerfil.style.display = "none"; 
            }, 300);
        }
    });

    // atualizar senha
    botaoAtualizarSenha.addEventListener('click', function() {
        if (formAtualizarSenha.style.display === "none" || formAtualizarSenha.style.display === "") {
            formAtualizarSenha.style.display = "flex";
            formAtualizarSenha.classList.add('fade-in'); 
            formEditarPerfil.style.display = 'none'; // Esconde o formulário de editar perfil
        } else {
            formAtualizarSenha.classList.remove('fade-in'); 
            setTimeout(() => {
                formAtualizarSenha.style.display = "none"; 
            }, 300);
        }
    });

    // fecha quando clicar fora
    formEditarPerfil.addEventListener('click', function(e) {
        if (e.target === formEditarPerfil) {
            formEditarPerfil.classList.remove('fade-in'); 
            setTimeout(() => {
                formEditarPerfil.style.display = "none"; 
            }, 300);
        }
    });

    formAtualizarSenha.addEventListener('click', function(e) {
        if (e.target === formAtualizarSenha) {
            formAtualizarSenha.classList.remove('fade-in'); 
            setTimeout(() => {
                formAtualizarSenha.style.display = "none"; 
            }, 300);
        }
    });
});