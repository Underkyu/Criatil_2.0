document.querySelector('.btn-vermais').addEventListener('click', function() {
    const container = document.querySelector('.produtos');
    for (let i = 0; i < 3; i++) {
        const card = document.createElement('div');
        card.className = 'card';
        card.textContent = 'Card de produtos';
        container.appendChild(card);
    }
});