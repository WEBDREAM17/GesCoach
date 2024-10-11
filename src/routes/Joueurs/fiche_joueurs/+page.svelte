<script>
	import { Table, Col, Row } from '@sveltestrap/sveltestrap';
	import { onMount } from 'svelte';
	import { page } from '$app/stores';
	import RadarChart from '../../composants/RadarChart.svelte'; 
	import { _servicepath } from '../../store';

	let liste_joueurs = [];
	let liste_eval = [];
	let liste_poste = [];
	let eval1 = [];
	let eval2 = [];
	let eval3 = [];

	let eval1FormatteGraph = [];
	let eval2FormatteGraph = [];
	let eval3FormatteGraph = [];
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
	let id_joueur = '-1';

	onMount(async () => {
		// @ts-ignore
		id_joueur = $page.url.searchParams.get('id');
		await recupererJoueur(id_joueur);
		await recupererEval(id_joueur);
		await recupererPoste(id_joueur);
		
		
		
	});
	const recupererJoueur = async () => {
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
				console.log('photo : ' + url_photo);
				//Si pas de photo alors on affiche la photo générique
				if(url_photo == null || url_photo == '') 
				{					
					url_photo = 'src/lib/images/avatar_garcon.png';
					console.log('photo2 : ' + url_photo);
				}
				else
				{
					url_photo = 'http://localhost/webservice/' + monJoueur.url_photo;
				}

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
	
	const recupererEval = async () => {
		try {
			//On crée le User
			const updateRoute = _servicepath + 'recuperer_eval_idjoueur.php';
			const data = new FormData();
			data.append('id_joueur', id_joueur);
			let res = await fetch(updateRoute, {
				method: 'POST',
				body: data
			});

			res = await res.json();
			// @ts-ignore
			if (res.status == '1') {
				console.log(res.data)
				liste_eval = res.data;
				
				liste_eval.forEach(evalu => {
					if(compteur == 0)
					{
						console.log('eval :');
						console.log(evalu);
						eval1 = evalu;
						eval1FormatteGraph[0] = 6;
						eval1FormatteGraph[1] = 8;
						eval1FormatteGraph[2] = 7;
						eval1FormatteGraph[3] = 5; 
						console.log(eval1FormatteGraph);
					}
					if(compteur == 1)
					{
						eval2 = evalu;
						eval2FormatteGraph[0] = evalu.noteAssiduite;
						eval2FormatteGraph[1] = evalu.noteVitesse;
						eval2FormatteGraph[2] = 4;
						eval2FormatteGraph[3] = 4; 
					}
					if(compteur == 2)
					{
						eval3 = evalu;
						eval3FormatteGraph[0] = evalu.noteAssiduite;
						eval3FormatteGraph[1] = evalu.noteVitesse;
						eval3FormatteGraph[2] = 4;
						eval3FormatteGraph[3] = 4; 
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
	const recupererPoste = async () => {
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

				
				// @ts-ignore
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

<div class="identite">
	<img src="/images/logo.png" alt="">
	<div class="info">
		<h3>{poste1} {poste2}</h3>
		<h1>{nom} {prenom}</h1>
		<a class="retour" href="/Admin/Liste_joueurs">Liste joueur</a>
	</div>
	<img src="/{url_photo}" alt="">
</div>

<Row
	style="border:2px solid black;margin:20px; display:flex; align-items:center;justify-content:center;"
>
	<Col style="border:2px solid black;margin:20px;">
		<Table striped>
			<thead>
				<h1>Capacité Physique</h1>
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
	<Col style="border:2px solid black;margin:20px; width:500px;" xs="6"><RadarChart notesEvals1={eval1FormatteGraph} notesEvals2={eval1FormatteGraph} notesEvals3={eval1FormatteGraph} dataColors={["blue","blue","red","red"]}/></Col>
</Row>

<Row style="border:2px solid black;margin:20px; display:flex; align-items:center;justify-content:center;">
	<Col style="border:2px solid black;margin:20px;">
		<Table striped>
			<thead>
				<h1>Capacités Mentales</h1>
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
	<Col style="border:2px solid black;margin:20px; width:500px;" xs="6"><RadarChart notesEvals1={eval1FormatteGraph} notesEvals2={eval1FormatteGraph} notesEvals3={eval1FormatteGraph} dataColors={["blue","blue","red","red"]}/></Col>
</Row>
	
	<Row style="border:2px solid black;margin:20px; display:flex; align-items:center;justify-content:center;">
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
		<Col style="border:2px solid black;margin:20px; width:500px;" xs="6"><RadarChart notesEvals1={eval1FormatteGraph} notesEvals2={eval1FormatteGraph} notesEvals3={eval1FormatteGraph} dataColors={["blue","blue","red","red"]}/></Col>
	</Row>

	<Row style="border:2px solid black;margin:20px; display:flex; align-items:center;justify-content:center;">
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
		<Col style="border:2px solid black;margin:20px; width:500px;" xs="6"><RadarChart notesEvals1={eval1FormatteGraph} notesEvals2={eval1FormatteGraph} notesEvals3={eval1FormatteGraph} dataColors={["blue","blue","red","red"]}/></Col>
	</Row>
	<style>
		h1{
			color: black;
			font-size: 5rem;
			margin: 10px ;
		
		}
		img{
			width:200px;
		}
		.identite{
			display:flex;
			justify-content: space-around;
			align-items: center;
		}	
		.info {
			text-align: center;
		}
		.retour {
			background-color: rgb(147, 210, 255);
			padding: 10px 10px;
			color: black;
			border-radius: 10px;;
		}
	</style>