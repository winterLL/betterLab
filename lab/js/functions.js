function openPopup(id) {
    document.getElementById(id).style.display = 'block';
};

function closePopup(id) {
    document.getElementById(id).style.display = 'none';
};

window.onclick = function(event) {
    let popups = document.querySelectorAll('.popup');
    popups.forEach(popup => {
        if (event.target == popup) {
            popup.style.display = 'none';
        }
    });
};