<script>
	import { Table, Image, Col, Row } from '@sveltestrap/sveltestrap';
	import { onMount } from 'svelte';

	let liste_coachs = [''];
	let nom = [''];
	let _servicepath = 'http://localhost/webservice/';

	onMount(async () => {
		await recupererCoach();
	});
	const recupererCoach = async () => {
		try {
			//On crée le User
			const updateRoute = _servicepath + 'recuperer_personnes.php';
			const data = new FormData();

			let res = await fetch(updateRoute, {
				method: 'POST',
				body: data
			});

			console.log('avant requete');
			res = await res.json();

			console.log(res);
			// @ts-ignore
			if (res.status == '1') {
				liste_coachs = res.data;
				console.log(liste_coachs);
			} else {
				// @ts-ignore
				console.log(res.message);
			}
		} catch (error) {
			console.log(error);
		}
	};
</script>

<h1>Liste des Coachs</h1>
<Row>
	<Col
		class="nav"
		style=" background-color:brown; margin-top:20px; margin-bottom:20px; display:flex; justify-content:center; align-items:center"
	>
		<a href="/" style="margin-top:20px; margin-bottom:20px; border-radius:10px;"
			>Liste des Coachs</a
		>
		<a href="/" style="margin-top:20px; margin-bottom:20px; border-radius:10px;">Calendriers</a>
		<a href="/" style="margin-top:20px; margin-bottom:20px; border-radius:10px;">Membres</a>
		<a href="/" style="margin-top:20px; margin-bottom:20px; border-radius:10px;">statistiques</a>
		<a href="/" style=" margin-top:20px; margin-bottom:20px; border-radius:10px;">Documents</a>
		<a href="/" style="margin-top:20px; margin-bottom:20px; border-radius:10px;">Gestion</a>
	</Col>
</Row>
<Table striped>
	<thead>
		<tr>
			<th>#</th>
			<th>Nom</th>
			<th>Prénom</th>
			<th>E-mail</th>
			<th>Téléphone</th>
			<th>N° licence</th>
			<th>Date de naissance</th>
			<th>Diplôme</th>
			<th>Catégorie</th>
			<th>Spécifique</th>
			<th>Stage</th>
		</tr>
	</thead>
	<tbody>
    {#each liste_joueurs as joueur}
		<tr>
			<th scope="row">1</th>
			<td>Mark</td>
			<td>Otto</td>
			<td>@mdo</td>
			<td>Mark</td>
			<td>Otto</td>
			<td>@mdo</td>
			<td>Mark</td>
			<td>Otto</td>
			<td>@mdo</td>
			<td>Mark</td>
		</tr>
    {/each}
	</tbody>
</Table>
