<script>
	import { Table, Col, Row, Button, Modal, Input, ModalFooter } from '@sveltestrap/sveltestrap';
	import { onMount } from 'svelte';
	import { page } from '$app/stores';
	import RadarChart from '../composants/RadarChart.svelte'; 

	let nom_categorie = 'U12';
	let id_coach = ''; 
	let id_categorie = ''; 
	let id_equipe = ''; 
	let id_joueur = '';
	let nom_equipe = 'Criterium';
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
	

	let _servicepath = 'http://localhost/webservice/';

	onMount(async () => {
		let id_joueur = $page.url.searchParams.get('id');
		await recupererListeEquipeParEquipe();
	});

	const recupererListeEquipeParEquipe = async () => {
		try {
			//On recupere la liste des joueurs par equipe
			const updateRoute = _servicepath + 'recuperer_listeJoueurParEquipe.php';
			const data = new FormData();
			data.append('nom_categorie', nom_categorie);
			data.append('nom_equipe', nom_equipe);
			
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
<Row
	style="display:flex;border: 2px solid black; background-color: white; margin:20px; display:flex; align-items:center;justify-content:space-between;">
	<Col><img style="width:200px;" class="logoClub" src="src/lib/images/WhatsApp Image 2024-09-05 at 11.36.21.jpeg" alt="" /></Col>
	<Col style="font-size:3rem; color:black;">{categorie} {equipe}</Col>
	<Col style="font-size:3rem; color:black;">{poste1} {poste2}</Col>
	<Col style="border:2px solid black; background-color: grey; text-align:center;margin-right:100px;"><a style="color:black; text-decoration:none; " href="/Nos equipes">Retour a nos équipes</a></Col>
</Row>
<Row style="margin:20px;">
<Table bordered>
<thead>
	<tr>
	  <th>#</th>
	  <th>NOM</th>
	  <th>PRENOM</th>
	  <th>POSTE 1</th>
	  <th>POSTE 2</th>
	  <th>COACH</th>
	</tr>
  </thead>
  <tbody>
	{#each listeEquipe as joueur }
	<tr>
	  <th scope="row">1</th>
	  <td>{joueur.nom}</td>
	  <td>{joueur.prenom}</td>
	  <td>{joueur.poste1}</td>
	  <td>{joueur.poste2}</td>
	  <td>{{joueur.coach}}</td>
	</tr>
	{/each}
	
  </tbody>
</Table>
</Row>

	


	

