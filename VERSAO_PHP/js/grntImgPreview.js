document.addEventListener('DOMContentLoaded', function() {
    function previewImages() {
        const inputs = document.querySelectorAll('.arquivo-input');
        const previews = document.querySelectorAll('.imagemPreview');

        inputs.forEach((input, index) => {
            input.addEventListener('change', function(event) {
                const file = event.target.files[0];
                
                if(file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        previews[index].src = e.target.result;
                        previews[index].style.display = 'flex'; // aparece
                    };
                    reader.readAsDataURL(file);
                }else {
                    previews[index].src = '';
                    previews[index].style.display = 'none'; // some
                }
            });
        });
    }
    previewImages();
});