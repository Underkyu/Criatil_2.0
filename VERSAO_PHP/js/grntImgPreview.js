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

// atualiza todas as previews
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
// Função para atualizar as previews do formulário de inserção
function updatePreviewsInsert() {
    ['1', '2', '3'].forEach(num => {
        const input = document.getElementById(`inserirImagem${num}`);
        const preview = document.getElementById(`inserirPreview${num}`);
        const previewdiv = document.getElementById(`inserirPreviewdiv${num}`);
        
        if (input && preview && previewdiv) {
            if (input.value) {
                preview.src = input.value;
                previewdiv.style.display = 'flex';
            } else {
                preview.src = '';
                previewdiv.style.display = 'none';
            }
        }
    });
}

// eventos pra funcionar no form de insert
window.addEventListener('load', () => {
    prepararPreview('inserirImagem1', 'inserirPreview1', 'inserirPreviewdiv1');
    prepararPreview('inserirImagem2', 'inserirPreview2', 'inserirPreviewdiv2');
    prepararPreview('inserirImagem3', 'inserirPreview3', 'inserirPreviewdiv3');
});

// Tornar a função pública para ser usada em outros arquivos, se necessário
window.updatePreviewsInsert = updatePreviewsInsert;
// deixa a função pública pra ser usada pelo grntDetalhes.js
window.updatePreviews = updatePreviews;