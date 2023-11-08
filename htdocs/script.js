document.querySelector("form").addEventListener("submit", function(e) {
    e.preventDefault();

    const squareArea = parseFloat(document.getElementById("squareArea").value);
    const circleRadius = parseFloat(document.getElementById("circleRadius").value);
    const wallToStage = parseFloat(document.getElementById("wallToStage").value);

    const A = Math.sqrt(squareArea);
    const D = circleRadius * 2;

    let result = "Нельзя";
    if (A - D > wallToStage) {
        result = "Можно";
    }

    document.querySelector('input[name="result"]').value = result;
    document.getElementById("result").textContent = result;

    this.submit();
});