const inputFile = document.querySelector('#Capa');
const imgArea = document.querySelector('.img-area');
const existingImg = imgArea.querySelector('img');

// Função para carregar uma imagem
function loadImg(image) {
    const reader = new FileReader();
    reader.onload = () => {
        const allImg = imgArea.querySelectorAll('img');
        allImg.forEach(item => item.remove());
        const imgUrl = reader.result;
        const img = document.createElement('img');
        img.src = imgUrl;
        imgArea.appendChild(img);
        imgArea.classList.add('active');
        imgArea.dataset.img = image.name;
    };
    reader.readAsDataURL(image);
}

// Adiciona evento de clique para abrir o seletor de arquivos
imgArea.addEventListener('click', function () {
    inputFile.click();
});

// Adiciona evento de mudança para carregar a nova imagem
inputFile.addEventListener('change', function () {
    const image = this.files[0];
    if (image.size < 20000000) { // 20MB em bytes
        loadImg(image);
    } else {
        alert("A imagem é maior que 20MB");
    }
});

// Carrega a imagem existente, se houver
if (existingImg) {
    imgArea.classList.add('active');
}