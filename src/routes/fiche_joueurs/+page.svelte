<script>
	import { Table, Col, Row } from '@sveltestrap/sveltestrap';
	import { onMount } from 'svelte';
	import { page } from '$app/stores';
	import RadarChart from '../composants/RadarChart.svelte'; 


	let liste_joueurs = [];
	let liste_eval = [];
	let liste_poste = [];
	let eval1 = [];
	let eval2 = [];
	let eval3 = [];
	let nom = '';
	let prenom = '';
	let date = '';
	let categorie = '';
	let equipe = '';
	let licence = '';
	let poste1 = '';
	let poste2 = '';
	let url_photo ='';
	let compteur = 0;
	let dataColors;

	let _servicepath = 'http://localhost/webservice/';

	onMount(async () => {
		let id_joueur = $page.url.searchParams.get('id');
		await recupererJoueur(id_joueur);
		await recupererEval(id_joueur);
		await recupererPoste(id_joueur);
	});
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

				if (date == null) {
					date = 'date non renseigné';
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
	const recupererEval = async (id_joueur) => {
		try {
			//On crée le User
			const updateRoute = _servicepath + 'recuperer_eval_idjoueur.php';
			const data = new FormData();
			data.append('id_joueur', id_joueur);
			let res = await fetch(updateRoute, {
				method: 'POST',
				body: data
			});

			console.log('avant requete eval');
			res = await res.json();
			console.log('2');
			console.log(res);
			// @ts-ignore
			if (res.status == '1') {
				console.log(res.data)
				liste_eval = res.data;
				
				liste_eval.forEach(evalu => {
					if(compteur == 0)
					{
						console.log(evalu);
						eval1 = evalu;
					}
					if(compteur == 1)
					{
						eval2 = evalu;
					}
					if(compteur == 2)
					{
						eval3 = evalu;
					}
					compteur = compteur+1;
				});

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
	style="border:2px solid black;margin:20px; display:flex; align-items:center;justify-content:center;"
>
	<Col><img class="logoClub" src="/src/lib/images/16.png" alt="" /></Col>
	<Col style="font-size:3rem;">{nom} {prenom}</Col>
	<Col style="font-size:3rem;">{poste1} {poste2}</Col>
	<Col><img src="http://localhost/webservice{url_photo}" width="300px"/></Col>
</Row>
<Row
	style="border:2px solid black;margin:20px; display:flex; align-items:center;justify-content:center;"
>
	<Col style="border:2px solid black;margin:20px;">
		<Table striped>
			<thead>
				<h1>Capacité Mentale</h1>
			<tr>
				<th>Aspect</th>
			{#if compteur>0}

				<th>{eval1.date}</th>
			{/if}
			{#if compteur>1}

				<th>{eval2.date}</th>
			{/if}
			{#if compteur>2}

				<th>{eval3.date}</th>
			{/if}
				</tr>
			</thead>
			<tbody>
				<tr>
				<td>Endurance</td>
				<td>{#if compteur>0}

					{eval1.noteEndurance}/10
				{/if}</td>
				<td>{#if compteur>1}

					{eval2.noteEndurance}/10
				{/if}</td>
				<td>{#if compteur>2}

					{eval3.noteEndurance}/10
				{/if}</td>
				</tr>
			</tbody>
			<tr>
				<td>Vitesse</td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tbody>
			<tr>
				<td>Coordination</td>
				<td></td>
				<td></td>
				<td></td>
				</tr>
			</tbody>
			<tr>
				<td>Force</td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
		</Table>
	</Col>
	<Col style="border:2px solid black;margin:20px;" xs="6"><RadarChart dataColors={["blue","blue","red","red"]}/></Col>
	<Col style="border:2px solid black;margin:20px;">
		<Table striped>
			<thead>
				<h1>Capacités Physiques</h1>
			<tr>
				<th>Aspect</th>
				<th>Date 1</th>
				<th>Date 2</th>
				<th>Date 3</th>
				</tr>
			</thead>
			<tbody>
				<tr>
				<td>Endurance</td>
				<td></td>
				<td></td>
				<td></td>
				</tr>
			</tbody>
			<tr>
				<td>Vitesse</td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tbody>
			<tr>
				<td>Coordination</td>
				<td></td>
				<td></td>
				<td></td>
				</tr>
			</tbody>
			<tr>
				<td>Force</td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
		</Table>
	</Col>
	<Col style="border:2px solid black;margin:20px;" xs="6">.col-6</Col>
	<Col style="border:2px solid black;margin:20px;">
		<Table striped>
			<thead>
				<h1>Capacités Techniques</h1>
			<tr>
				<th>Aspect</th>
				<th>Date 1</th>
				<th>Date 2</th>
				<th>Date 3</th>
				</tr>
			</thead>
			<tbody>
				<tr>
				<td>Conduite</td>
				<td></td>
				<td></td>
				<td></td>
				</tr>
			</tbody>
			<tr>
				<td>Passe</td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tbody>
			<tr>
				<td>Drible</td>
				<td></td>
				<td></td>
				<td></td>
				</tr>
			</tbody>
			<tr>
				<td>Tir</td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
		</Table>
	</Col>
	<Col style="border:2px solid black;margin:20px;" xs="6">.col-6</Col>
	<Col style="border:2px solid black;margin:20px;">
		<Table striped>
			<thead>
				<h1>Capacités Tactiques</h1>
			<tr>
				<th>Aspect</th>
				<th>Date 1</th>
				<th>Date 2</th>
				<th>Date 3</th>
				</tr>
			</thead>
			<tbody>
				<tr>
				<td>Jeu defensif</td>
				<td></td>
				<td></td>
				<td></td>
				</tr>
			</tbody>
			<tr>
				<td>Jeu offensif</td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tbody>
			<tr>
				<td>Vision du jeu</td>
				<td></td>
				<td></td>
				<td></td>
				</tr>
			</tbody>
			<tr>
				<td>Prise de décision</td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
		</Table>
	</Col>
	<Col style="border:2px solid black;margin:20px;" xs="6"></Col>
</Row>
