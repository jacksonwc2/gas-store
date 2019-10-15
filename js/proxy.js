function post_request(url, success, fail, parameters) {
    this.request(url, success, fail, parameters, "POST");
}

function get_request(url, success, fail, parameters) {
    this.request(url, success, fail, parameters, "GET");
}

function delete_request(url, success, fail, parameters) {
    this.request(url, success, fail, parameters, "DELETE");
}

function request(url, success, fail, parameters, method) {
    
    $.ajax({
        method: method,
        url: url,
        data: JSON.stringify(parameters),
        dataType: "json",
        success: success,
        error: fail || this.falha
    });
}

function falha() {
    console.log('Deu ruim nego véi!');
}