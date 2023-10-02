function stateMachine() {
    var input = document.getElementById('expression');
    $.ajax({
        type: "POST",
        url: "/api/state-machine",
        dataType: 'json',
        data: {
            expression: input.value
        },
        success: function(result) {
            var message = input.value.replaceAll(' ', '') + ' = ' + result.data.result;
            addResult(message, 'green');
            input.value = "";
        },
        error: function(result) {
            addResult($.parseJSON(result.responseText).error.message, 'red');
        }
    });
}

function addResult(message, color) {
    const results = document.getElementById('results');
    const allChildren = results.getElementsByTagName('*').length;
    if (allChildren >= 10) {
        results.removeChild(results.getElementsByTagName('p')[0]);
    }
    var p = document.createElement('p');
    p.style.color = color;
    p.textContent = message;
    p.style.fontSize = '20px';
    results.appendChild(p);
}
