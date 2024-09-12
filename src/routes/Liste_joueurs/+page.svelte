<script>
	import { goto, invalidateAll } from "$app/navigation";
	import { Table, Button,Col, Row, Input, ModalFooter,
    ButtonGroup,
    Modal,
    ModalBody,
    ModalHeader } from "@sveltestrap/sveltestrap";
	import { onMount } from "svelte";

	let openSuppression = false;
  	const toggleSuppression = (/** @type {string} */ idJoueur) => {
		id_joueur = idJoueur;
		openSuppression = !openSuppression
	};
	/**
	 * @type {any[]}
	 */
	let liste_joueurs = [];
	let liste_coach = [];
	let liste_niveauEquipe = [];
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
	let niveau = '';
	
	let _servicepath = 'http://localhost/webservice/';
	let open = false;
  
	onMount ( async()=> {
		await recupererNiveauEquipe();
		await recupererJoueur();
		await recupererCoach();
		await recupererPoste(id_joueur);
		


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
				let monJoueur = liste_joueurs[0];
				nom = monJoueur.nom;
				prenom = monJoueur.prenom;
				date = monJoueur.date;
				equipe = monJoueur.equipe;
				licence = monJoueur.numero_licence;
				poste1 = monJoueur.poste1;
				poste2 = monJoueur.poste2;
				url_photo = monJoueur.url_photo;
				niveau = monJoueur.niveau;
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
	const supprimer_personne = async () => {
		try {

			//On crée le User
			const updateRoute = _servicepath + 'supprimer_personne.php';
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
				//On faut disparaitre la modal de confirmation
				toggleSuppression('-1');

				//On actualise la liste
				await recupererJoueur();

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
	const recupererNiveauEquipe = async () => {
		try {
			//On crée le User
			const updateRoute = _servicepath + 'recuperer_niveauEquipe.php';
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
				liste_niveauEquipe = res.data;
				console.log(liste_niveauEquipe);
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
				
				goto('evaluation_joueurs?id='+id_joueur);
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
			<th>Photo</th>
			<th>Fiche</th>
			<th>Evaluation</th>
			<th>Actions</th>
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
			<td>{liste_niveauEquipe[joueur.niveau].nom_equipe}</td>
			<td><img src="http://localhost/webservice{joueur.url_photo}" width="50px"/></td>
			<td><a href="/fiche_joueurs?id={joueur.id}" >Fiche</a></td>
			<td><Button on:click={()=>toggle(joueur.id)} style="border:0px;background-color:transparent;color:blue;text-decoration:underline;margin:0 auto;padding:0 auto;">Evaluation</Button></td>
			<td><Button on:click={()=>toggleSuppression(joueur.id)} style="border:0px;background-color:transparent;color:red;text-decoration:underline;margin:0 auto;padding:0 auto;">supprimer</Button></td>
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
	  <div>
		<Modal isOpen={openSuppression} backdrop={false}>
		  <ModalHeader>Etes vous sûr de vouloir supprimer ce joueur ?</ModalHeader>
		  
		  <ModalFooter>
			<Button color="primary" on:click={supprimer_personne}>Supprimer</Button>
			<Button color="secondary" on:click={()=>toggleSuppression('-1')}>Annuler</Button>
		  </ModalFooter>
		</Modal>
	  </div>

