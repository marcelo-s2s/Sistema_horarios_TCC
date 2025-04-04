document.addEventListener("DOMContentLoaded", function () {
    let corInput = document.getElementById("cor");

    if (corInput.value === "#000000") {
        let corAleatoria = tinycolor.random().toHexString();
        corInput.value = corAleatoria;
    }
});