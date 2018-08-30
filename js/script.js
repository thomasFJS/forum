var idUser;
var surname;
var name;
var login;

function init() {
	$.get("../php/login.php",function(data){

			var donnees = JSON.parse(data);
			idUser = donnees.id;
			surname = donnees.surname;
			name = donnees.name;
			login = donnees.login;
			$('#msgWelcome').html("Bonjour " + surname + " " + name + ", voici votre fil d'actualités!");
		});
}


$(function() {
	init();

});
