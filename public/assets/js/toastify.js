document.addEventListener("DOMContentLoaded", function () {

  if (flashdata.success) {
      showToast(flashdata.success, "success");
  }

  if (flashdata.error) {
      showToast(flashdata.error, "error");
  }
});

function showToast(message, type) {
  Toastify({
    text: message,
    duration: 3000,
    close: true, //Com ou sem botão de fechar
    backgroundColor: type === 'success' ? 'green' : 'red',
    // Exemplo de cor de fundo degradê: 
    // backgroundColor: "linear-gradient(to right, #00b09b, #96c93d)",
    // Mudar a posição da Toastify:
    // gravity: "bottom", (Pode ser "top")
    // position: "left", (Pode ser "right" e "center")
  }).showToast()
}