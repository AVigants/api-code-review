function displayAvatar(form, response) {
    let app = document.querySelector('#app');
    let output = ''
   

    for (entry in response) {
        console.log(response[entry]);
        if (entry !== 'image') {
            output += '<p><b>' + entry + '</b> ' + response[entry] + "</p>"
        }
        else {
            output += '<img src="' + response[entry] + '" height="100px" >';
        }
    }


    app.innerHTML = output;

}