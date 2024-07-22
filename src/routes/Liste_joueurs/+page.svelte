<script>
	import { goto } from "$app/navigation";
	import { Table, Button,Col, Row} from "@sveltestrap/sveltestrap";
	import { onMount } from "svelte";

	let liste_joueurs = [];
	let nom = '';
    let prenom = '';
    let date = '';
	let categorie = '';
	let equipe= '';
	let licence = '';
	let poste1 = '';
	let poste2 = '';
	let _servicepath = 'http://localhost/webservice/';

	onMount ( async()=> {
		await recupererJoueur();

	})
	const recupererJoueur = async () => {
		try {
			//On crée le User
			const updateRoute = _servicepath + 'recuperer_personnes.php';
			const data = new FormData();
			data.append('id_statut','2');
			let res = await fetch(updateRoute, {
				method: 'POST',
				body: data
			});

			console.log('avant requete')
			res = await res.json();

			console.log(res);
			// @ts-ignore
			if (res.status == '1') {
				liste_joueurs = res.data;
                nom = '';
                prenom = '';
                date = '';
				categorie ='';
				equipe = '';
				licence ='';
				poste1 = '';
				poste2 = '';
				console.log(liste_joueurs);
			} else {
				// @ts-ignore
				console.log(res.message);
			}
		} catch (error) {
			console.log(error);
		}
	};
	</script>
	
	<h1>Liste Joueurs</h1>
<Button color="info" on:click={()=>goto('creation_personne')}>Créer un joueur</Button>
	<Table striped>
		<thead>
		  <tr>
			<th>#</th>
			<th>Nom</th>
			<th>Prénom</th>
			<th>N° licence</th>
			<th>Date de naissance</th>
			<th>Téléphone</th>
			<th>Poste</th>
			<th>Poste2</th>
			<th>Catégorie</th>
			<th>Niveau</th>
			<th>Fiche</th>
		  </tr>
		</thead>
		<tbody>
			{#each liste_joueurs as joueur}
		  <tr>
			<th scope="row">1</th>
			<td>{joueur.nom}</td>
			<td>{joueur.prenom}</td>
			<td>{joueur.numero_licence}</td>
			<td>{joueur.date_naissance}</td>
			<td>{joueur.tel}</td>
			<td>{joueur.poste1}</td>
			<td>{joueur.poste2}</td>
			<td>{joueur.id_categorie}</td>
			<td>{joueur.equipe}</td>
			<td><a href="/fiche_joueurs?id={joueur.id}">Fiche</a></td>
		  </tr>
		 {/each}
		</tbody>
	  </Table>


