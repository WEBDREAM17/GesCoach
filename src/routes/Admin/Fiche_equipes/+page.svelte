<script>
	import { Table, Col, Row, Button, Modal, Input, ModalFooter } from '@sveltestrap/sveltestrap';
	import { onMount } from 'svelte';
	import { page } from '$app/stores';
	

	let nom_categorie = '';
	let id_coach = ''; 
	let id_joueur = '';
	let nom_equipe = '';
	let annee = '';
	let annee2= 0;
	let nom = '';
    let prenom = '';

	let listeCoach = [];
	let validated = false;


  let listeEquipe = [];
	let errorMessage = '';

  	let listeCategorie = [];
	let liste_joueurs = [];

	let liste_poste = [];
	
	
	let date = '';
	let categorie = '';
	let equipe = '';
	let licence = '';
	let poste1 = '';
	let poste2 = '';
	let id_equipe = '';
	let id_categorie ='';
	let _servicepath = 'http://localhost/webservice/';
	let nomPrenomCoach = '';
	let compteurJoueurs = 0;

	onMount(async () => {
		id_equipe = $page.url.searchParams.get('id_equipe');
		id_categorie = $page.url.searchParams.get('id_categorie');
		await recupererListeEquipeParEquipe();
		await recupererCoachEquipe();
		await recupererPoste();
	});

	const recupererListeEquipeParEquipe = async () => {
		try {
			//On recupere la liste des joueurs par equipe
			const updateRoute = _servicepath + 'recuperer_listeJoueurParEquipe.php';
			const data = new FormData();
			data.append('id_equipe', id_equipe);
			data.append('id_categorie', id_categorie);
			
			let res = await fetch(updateRoute, {
				method: 'POST',
				body: data
			});

			console.log('avant requete equipe');
			res = await res.json();
			console.log(res.data);
			//console.log(res);
			if(res.status == '1') 
			{
				listeEquipe = res.data;	
				nom_equipe = listeEquipe[0].nom_equipe;
				nom_categorie = listeEquipe[0].nom_categorie;	
			} 
			else 
			{
				console.log('erreur : ' + res.message);
			}

		} 
		catch (error) {
			console.log(error);
		}
	};

	const recupererCoachEquipe = async () => {
		try {
			//On recupere la liste des joueurs par equipe
			const updateRoute = _servicepath + 'recuperer_coachs_par_equipe.php';
			const data = new FormData();
			data.append('id_equipe', id_equipe);
			data.append('id_categorie', id_categorie);
			
			let res = await fetch(updateRoute, {
				method: 'POST',
				body: data
			});

			console.log('avant requete coach' + id_categorie + ' / ' + id_equipe);
			res = await res.json();
			//console.log(res);
			if(res.status == '1') 
			{
				let coach = res.data;	
				nomPrenomCoach = coach[0].nom + ' ' + coach[0].prenom;
				
			} 
			else 
			{
				console.log('erreur : ' + res.message);
			}

		} 
		catch (error) {
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
<Row style="margin:20px; display:flex; justify-content:center; border: 2px solid black; background-color: white; align-items:center;">
	<Col><img style="width:200px;" class="logoClub" src="src/lib/images/WhatsApp Image 2024-09-05 at 11.36.21.jpeg" alt="" /></Col>
	<Col style="font-size:2.5rem; color:black;">{nom_categorie} : {nom_equipe}</Col>
	<Col style="font-size:1.5rem; color:black;">COACH : {nomPrenomCoach}</Col>
	<Col style="border:2px solid black; background-color: grey; text-align:center;margin-right:100px;"><a style="color:black; text-decoration:none; " href="/Admin/Nos equipes">Nos équipes</a></Col>
</Row>
<Row style="margin:20px;">
<Table bordered>
<thead>
	<tr>
	  <th>NOM</th>
	  <th>PRENOM</th>
	  <th>POSTE 1</th>
	  <th>POSTE 2</th>
	</tr>
  </thead>
  <tbody>
	{#each listeEquipe as joueur }
	<tr>
	  <td>{joueur.nom}</td>
	  <td>{joueur.prenom}</td>
	  <td>{joueur.poste1}</td>
	  <td>{joueur.poste2}</td>
	</tr>
	{/each}
	
</tbody>
</Table>
</Row>

	


	

