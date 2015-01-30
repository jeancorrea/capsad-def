function getQueryString()
{
        var qs = window.location.search.substring(1).split('&');

        for (var i = 0; i < qs.length; i++) {
                qs[i] = qs[i].split('=');
        }

        return qs;
}

var queryString = getQueryString();
var msg          = 'Cliente cadastrado com id nº ';

for (var i = 0; i < queryString.length; i++) {
        msg += queryString[i][1];
}
if (msg != 'Cliente cadastrado com id nº undefined') {
alert(msg);
}

function insereTexto(e)  {
	if (event.which == 13 || event.keyCode == 13) {
var x=document.getElementById('s1').value;

document.getElementById( 'membros' ).value+=x+", ";
}
}