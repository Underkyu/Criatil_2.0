// função pra atualizar a preview de img do form de acordo com oq tá inserido no form do caminho da imagem
function prepararPreview(inputId, previewId, previewdivId) {
    const input = document.getElementById(inputId);
    const preview = document.getElementById(previewId);
    const previewdiv = document.getElementById(previewdivId);

    if (!input || !preview || !previewdiv) return;

    function updatePreview() {
        if (input.value) {
            preview.src = input.value;
            previewdiv.style.display = 'flex';
        }else {
            preview.src = '';
            previewdiv.style.display = 'none';
        }
    }
    input.addEventListener('input', updatePreview);
}

window.addEventListener('load', () => {
    prepararPreview('imagem1', 'preview1', 'previewdiv1');
    prepararPreview('imagem2', 'preview2', 'previewdiv2');
    prepararPreview('imagem3', 'preview3', 'previewdiv3');
});

// atualiza todas as previews e 
function updatePreviews() {
    ['1', '2', '3'].forEach(num => {
        const input = document.getElementById(`imagem${num}`);
        const preview = document.getElementById(`preview${num}`);
        const previewdiv = document.getElementById(`previewdiv${num}`);
        
        if (input && preview && previewdiv) {
            if (input.value) {
                preview.src = input.value;
                previewdiv.style.display = 'flex';
            }else {
                preview.src = '';
                previewdiv.style.display = 'none';
            }
        }
    });
}

// deixa a função pública pra ser usada pelo grntDetalhes.js
window.updatePreviews = updatePreviews;