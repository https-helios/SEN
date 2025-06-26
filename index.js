function runPython() {
    fetch('run_python.php')
        .then(reponse=>Response.text())
        .then (data => {
            document.getElementById("output").innerText=data;
        });
}