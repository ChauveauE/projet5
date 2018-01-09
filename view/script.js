function insert()
{
	var ajout = document.getElementById('tache').value;
	var req = new XMLHttpRequest();
	req.open('POST', 'requete.php', false);
	req.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	req.send('tache='+ajout);
	window.location.href='.';
}

function sup(e)
{
	var id = e.id;
	var req = new XMLHttpRequest();
	req.open('POST', 'requete.php', false);
	req.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	req.send('id='+id+'&delete');
	window.location.href='.';
}