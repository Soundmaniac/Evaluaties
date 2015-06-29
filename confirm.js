/*Zorgt voor bevestiging op element met een confirmation class*/
var elementToConfirm = document.getElementsByClassName('confirmation');
var confirmIt = function (e)
{
	if (!confirm('Weet u zeker dat u deze gegeven wil verwijderen? (Alle gegevens en afgelegde evaluatie informatie zal verloren gaan!)')) e.preventDefault();
};

for (var i = 0, l = elementToConfirm.length; i < l; i++)
{
	elementToConfirm[i].addEventListener('click', confirmIt, false);
}
/*Einde bevestiging*/