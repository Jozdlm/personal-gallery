const imgPreview = document.getElementById('image-preview');
const imgInput = document.getElementById('image');

const listenInputChange = () => {
    if (imgInput.files[0]) {
        const imgFile = imgInput.files[0];

        let reader = new FileReader();
        reader.onload = (e) => {
            imgPreview.src = e.target.result;
        }
        reader.readAsDataURL(imgFile);
        
        imgPreview.style.display = 'block';
    } else {
        imgPreview.style.display = 'none';
        imgPreview.src = "";
    }
}

imgInput.addEventListener('change', listenInputChange)