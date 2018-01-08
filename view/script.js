function insert()
{
	var ajout = document.getElementById('tache').value;
	var req = new XMLHttpRequest();
	req.open('POST', 'requete.php', false);
	req.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	req.send('tache='+ajout);
	window.location.href='.';
}

function sup()
{
	var sup = document.getElementById('tachesup').value;
	var req = new XMLHttpRequest();
	req.open('POST', 'requete.php', false);
	req.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	req.send('id='+sup+'&delete');
	window.location.href='.';
}