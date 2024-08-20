<script>
	import { goto } from "$app/navigation";
	import { Table, Button,Col, Row, Modal, Input, ModalFooter} from "@sveltestrap/sveltestrap";
	import { onMount } from "svelte";

	/**
	 * @type {any[]}
	 */
	let liste_joueurs = [];
	let liste_coach = [];
	let id_joueur = '';
	let id_personne ='';
	let nom = '';
    let prenom = '';
    let date = '';
	let categorie = '';
	let equipe= '';
	let licence = '';
	let poste1 = '';
	let poste2 = '';
	let _servicepath = 'http://localhost/webservice/';
	let open = false;
  
	onMount ( async()=> {
		await recupererJoueur();
		await recupererCoach();

	})
	const toggle = (/** @type {string} */ idJoueur) => {
		id_joueur = idJoueur;
		(open = !open);
	}
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
	const recupererCoach = async () => {
		try {
			//On crée le User
			const updateRoute = _servicepath + 'recuperer_personnes.php';
			const data = new FormData();
			data.append('id_statut','1');
			let res = await fetch(updateRoute, {
				method: 'POST',
				body: data
			});

			console.log('avant requete')
			res = await res.json();

			console.log(res);
			// @ts-ignore
			if (res.status == '1') {
				liste_coach = res.data;
               
				
			} else {
				// @ts-ignore
				console.log(res.message);
			}
		} catch (error) {
			console.log(error);
		}
	};
	const creerDemandeEval = async () => {
		try {

			//On crée le User
			const updateRoute = _servicepath + 'demande_evaluation.php';
			const data = new FormData();
			data.append('id_joueur',id_joueur);
			data.append('id_personne',id_personne);
			let res = await fetch(updateRoute, {
				method: 'POST',
				body: data
			});

			console.log('avant requete')
			res = await res.json();

			console.log(res);
			// @ts-ignore
			if (res.status == '1') {
				toggle('-1');

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
			<th>Evaluation</th>
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
			<td>{joueur.equipe} <img src="http://localhost/webservice{joueur.url_photo}" width="50px"/></td>
			<td><a href="/fiche_joueurs?id={joueur.id}" >Fiche</a></td>
			<td><Button on:click={()=>toggle(joueur.id)} style="border:0px;background-color:transparent;color:blue;text-decoration:underline;margin:0 auto;padding:0 auto;">Evaluation</Button></td>
		  </tr>
		 {/each}
		</tbody>
	  </Table>
	  <Modal body header="Lancer une évaluation" isOpen={open} {toggle}>
		Veuillez choisir l'évaluateur dans la liste ci-dessous :
		<Input type="select" id='selListeCoach' bind:value={id_personne}>
			{#each liste_coach as coach}
			<option value="{coach.id}">{coach.nom} {coach.prenom}</option>
			{/each}
		</Input>

		<ModalFooter>
			<Button color="primary" on:click={creerDemandeEval}>Lancer L'évaluation</Button>
			<Button color="secondary" on:click={()=>toggle('-1')}>Annuler</Button>
		  </ModalFooter>
	  </Modal>

