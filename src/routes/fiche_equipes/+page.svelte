<script>
	import { Table, Col, Row, Button, Modal, Input, ModalFooter } from '@sveltestrap/sveltestrap';
	import { onMount } from 'svelte';
	import { page } from '$app/stores';
	import RadarChart from '../composants/RadarChart.svelte'; 

	let nom_categorie = '';
	let id_coach = ''; 
	let id_categorie = ''; 
	let id_equipe = ''; 
	let id_joueur = '';
	let nom_equipe = '';
	let annee = '';
	let annee2= 0;
	let nom = '';
    let prenom = '';
	/**
	 * @type {any[]}
	 */
	let listeCoach = [];
	let validated = false;

    /**
	 * @type {any[]}
	 */
  let listeEquipe = [];
	let errorMessage = '';
    /**
	 * @type {any[]}
	 */
  	let listeCategorie = [];
	let liste_joueurs = [];
	let liste_poste = [];
	
	
	let date = '';
	let categorie = '';
	let equipe = '';
	let licence = '';
	let poste1 = '';
	let poste2 = '';
	

	let _servicepath = 'http://localhost/webservice/';

	onMount(async () => {
		let id_joueur = $page.url.searchParams.get('id');
		await recupererJoueur(id_joueur);
		await recupererPoste(id_joueur);
		await recupererListeEquipe();
		await recupererListeCategorie();
		await recupererListeCoach();
		
	});
	const recupererListeEquipe = async () => {
		try {
			//On recupere un evenement
			const updateRoute = _servicepath + 'recuperer_listeEquipe.php';
			const data = new FormData();
			
			let res = await fetch(updateRoute, {
				method: 'POST',
				body: data
			});

			console.log('avant requete')
			res = await res.json();

			console.log(res);
			// @ts-ignore
			if (res.status == '1') {
				// @ts-ignore
				listeEquipe = res.data;
				
			} else {
				// @ts-ignore
				console.log(res.message);
			}
		} catch (error) {
			console.log(error);
		}
	};

  const recupererListeCategorie = async () => {
		try {
			//On recupere un evenement
			const updateRoute = _servicepath + 'recuperer_listeCategorie.php';
			const data = new FormData();
			
			let res = await fetch(updateRoute, {
				method: 'POST',
				body: data
			});

			console.log('avant requete')
			res = await res.json();

			console.log(res);
			// @ts-ignore
			if (res.status == '1') {
				// @ts-ignore
				listeCategorie = res.data;
				
			} else {
				// @ts-ignore
				console.log(res.message);
			}
		} catch (error) {
			console.log(error);
		}
	};

	const recupererListeCoach = async () => {
		try {
			//On recupere un evenement
			const updateRoute = _servicepath + 'recuperer_listeCoach.php';
			const data = new FormData();
			
			let res = await fetch(updateRoute, {
				method: 'POST',
				body: data
			});

			console.log('avant requete')
			res = await res.json();

			console.log(res);
			// @ts-ignore
			if (res.status == '1') {
				// @ts-ignore
				listeCoach = res.data;
				
			} else {
				// @ts-ignore
				console.log(res.message);
			}
		} catch (error) {
			console.log(error);
		}
	};
	const recupererJoueur = async (id_joueur) => {
		try {
			//On crée le User
			const updateRoute = _servicepath + 'recuperer_personnes_id.php';
			const data = new FormData();
			data.append('id_personne', id_joueur);
			let res = await fetch(updateRoute, {
				method: 'POST',
				body: data
			});

			console.log('avant requete');
			res = await res.json();

			
			// @ts-ignore
			if (res.status == '1') {
				liste_joueurs = res.data;
				let monJoueur = liste_joueurs[0];
				nom = monJoueur.nom;
				prenom = monJoueur.prenom;
				date = monJoueur.date;
				equipe = monJoueur.equipe;
				licence = monJoueur.numero_licence;
				poste1 = monJoueur.poste1;
				poste2 = monJoueur.poste2;
				url_photo = monJoueur.url_photo;

				if (date == null) {
					date = 'date non renseigné';
				}
				
			} else {
				// @ts-ignore
				console.log(res.message);
			}
		} catch (error) {
			console.log(error);
		}
	};
	
	const recupererPoste = async (id_joueur) => {
		try {
			//On crée le User
			const updateRoute = _servicepath + 'recuperer_poste.php';
			const data = new FormData();
			data.append('id_joueur', id_joueur);
			let res = await fetch(updateRoute, {
				method: 'POST',
				body: data
			});

			console.log('avant requete poste');
			res = await res.json();
			console.log('poste :');
			console.log(res);
			// @ts-ignore
			if (res.status == '1') {
				let posts = res.data;
				console.log(posts[0])
				if (posts [0]!=undefined)
				{
					poste1=posts[0].poste;
				}
				else{
					poste1 = '';
				}

				if (posts [1]!=undefined)
				{
					poste1=posts [1];
					
				}
				else{
					poste2 = '';
				}

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

<Row
	style="border:2px solid black; background-color: black; margin:20px; display:flex; align-items:center;justify-content:space-between;">
	<Col><img class="logoClub" src="src/lib/images/WhatsApp Image 2024-09-05 at 11.36.21.jpeg" alt="" /></Col>
	<Col style="font-size:3rem; color:white;">Categorie :{categorie.nom_categorie} Equipe :{equipe.nom_equipe}</Col>
	<Col style="font-size:3rem; color: white;"> Coach : {coach.nom} {coach.prenom} </Col>
	<Col style="border:2px solid black; background-color: grey; text-align:center; width:100px;"><a style="color:black; text-decoration:none; " href="/Nos equipes">Retour à la liste des équipes</a></Col>
</Row>
<Button color="info" on:click={()=>goto('creation_personne')}>Ajouter un joueur</Button>
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
			<th>Evaluation</th>
		  </tr>
		</thead>
		<tbody>
			{#each liste_joueurs as joueur}
		  <tr>
			<th scope="row">{joueur.id}</th>
			<td>{joueur.nom}</td>
			<td>{joueur.prenom}</td>
			<td>{joueur.numero_licence}</td>
			<td>{joueur.date_naissance}</td>
			<td>{joueur.tel}</td>
			<td>{joueur.poste1}</td>
			<td>{joueur.poste2}</td>
			<td>{joueur.id_categorie}</td>
			<td>{joueur.equipe} <img src="http://localhost/webservice{joueur.url_photo}" width="50px"/></td>
			<td><a href="/fiche_joueurs?id={joueur.id}" >Fiche</a></td>
			<td><Button on:click={()=>toggle(joueur.id)} style="border:0px;background-color:transparent;color:blue;text-decoration:underline;margin:0 auto;padding:0 auto;">Evaluation</Button></td>
			<td><Button on:click={()=>toggle(joueur.id)} style="border:0px;background-color:transparent;color:red;text-decoration:underline;margin:0 auto;padding:0 auto;">supprimer</Button></td>
		  </tr>
		 {/each}
		</tbody>
	  </Table>
	

	