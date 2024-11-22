// Fonction pour ajuster la taille de l'iframe
function adjustIframeSize(iframe) {
    try {
        // Ajuste la hauteur de l'iframe en fonction du contenu
        iframe.style.height = iframe.contentWindow.document.documentElement.scrollHeight + 'px';
    } catch (error) {
        console.error("Erreur lors de l'ajustement de l'iframe : ", error);
    }
}

// Cible l'iframe
const iframe = document.getElementById('dynamicIframe');

// Ajuste la taille initialement quand l'iframe est chargé
iframe.addEventListener('load', function () {
    adjustIframeSize(iframe);
});
