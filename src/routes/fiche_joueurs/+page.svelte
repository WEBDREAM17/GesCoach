<script>
	import { Table, Col, Row } from '@sveltestrap/sveltestrap';
	import { onMount } from 'svelte';
	import { page } from '$app/stores';

	let liste_joueurs = [];
	let nom = '';
	let prenom = '';
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
</script>

<Row
	style="border:2px solid black;margin:20px; display:flex; align-items:center;justify-content:center;"
>
	<Col><img class="logoClub" src="/src/lib/images/16.png" alt="" /></Col>
	<Col style="font-size:3rem;">{nom} {prenom}</Col>
	<Col style="font-size:3rem;">{nom} {prenom}</Col>
	<Col><img class="logoClub" src="/src/lib/images/16.png" alt="" /></Col>
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
				<th>Date 1</th>
				<th>Date</th>
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
				<h1>Capacités Physiques</h1>
			<tr>
				<th>Aspect</th>
				<th>Date 1</th>
				<th>Date</th>
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
				<th>Date</th>
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
				<th>Date</th>
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
	<Col style="border:2px solid black;margin:20px;" xs="6">.col-6</Col>
</Row>
