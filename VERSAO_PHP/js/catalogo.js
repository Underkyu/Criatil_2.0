document.querySelector('.btn-vermais').addEventListener('click', function() {
    const container = document.querySelector('.produtos');
    for (let i = 0; i < 3; i++) {
        const card = document.createElement('div');
        card.className = 'card';
        card.textContent = 'Card de produtos';
        container.appendChild(card);
    }
});

document.addEventListener('DOMContentLoaded', function () {
    const items = ['itemSlider1', 'itemSlider2', 'itemSlider3'];
    let currentItem = 0;

    function updateDisplay() {
        items.forEach((item, index) => {
            document.getElementById(item).style.display = (index === currentItem) ? 'block' : 'none';
        });
    }

    function showNextItem() {
        currentItem = (currentItem + 1) % items.length;
        updateDisplay();
    }

    function showPrevItem() {
        currentItem = (currentItem - 1 + items.length) % items.length;
        updateDisplay();
    }

    document.getElementById('next-button').addEventListener('click', showNextItem);
    document.getElementById('prev-button').addEventListener('click', showPrevItem);

    // Inicializa o display
    updateDisplay();
});
// Revisa a função ao redimensionar a janela
window.addEventListener('resize', function() {
    toggleFormFiltro();
});
function handleResize() {
    const isSmallScreen = window.innerWidth < 1024;

    document.querySelectorAll('.toggleDiv').forEach(function (titulo) {
        const formFiltro = titulo.nextElementSibling;

        if (isSmallScreen) {
            // Adiciona o evento de clique para telas menores que 1024px
            titulo.addEventListener('click', function () {
                formFiltro.classList.toggle('hidden');
            });
        } else {
            // Garante que o estilo de display seja "block" para telas maiores
            formFiltro.classList.remove('hidden');
        }
    });
}

// Chama a função quando a página é carregada
handleResize();

// Revisa a função ao redimensionar a janela
window.addEventListener('resize', handleResize);