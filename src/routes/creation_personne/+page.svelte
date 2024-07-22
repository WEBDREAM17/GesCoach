<script>
	import {
		Container,
		Row,
		Col,
		Icon,
		Label,
		Input,
		Button,
		Card,
		Progress,
		Alert
	} from '@sveltestrap/sveltestrap';
	import { goto } from '$app/navigation'
	import { onMount } from "svelte";

	let type_personne = '';
	let personne_poste = '';
	let validated = false;
	let nom = '';
	let prenom = '';
	let licence = '';
	let tel = '';
	let date_naissance ='';
	let mail = '';
	let id_equipe = '';
	let id_categorie = '';
	let poste1 = '';
	let poste2 = '';
	let annee = '';
	let errorMessage = '';
	let _servicepath = 'http://localhost/webservice/';
	let creationOk = false;

	onMount ( async()=> {
	
		annee=new Date().getFullYear().toString();
	})

	function Enregistrer() {
		console.log(nom);
		type_personne = '2';
		personne_poste = '';
	}
	const createPersonne = async () => {
		try {
			

			//On crée le User
			const updateRoute = _servicepath + 'creation_personne.php';
			const data = new FormData();


			data.append('nom', nom);
			data.append('prenom', prenom);
			data.append('mail', mail);
			data.append('telephone', tel);
			data.append('num_licence', licence);
			data.append('id_statut', type_personne);
			data.append('date_naissance', date_naissance);
			data.append('url_photo','');
			data.append('id_categorie', id_categorie);
			
			let res = await fetch(updateRoute, {
				method: 'POST',
				body: data
			});

			console.log('avant requete')
			res = await res.json();

			console.log(res);
			// @ts-ignore
			if (res.status == '1') {
				console.log('requete ok');
				creationOk = true;
				// @ts-ignore
				let id_joueur=res.id;
				if(type_personne=='2'){
					await createPostePerssonne(id_joueur,poste1);
				await createPostePerssonne(id_joueur,poste2);
				await createEquipePerssonne(id_joueur,id_equipe,id_categorie);
				goto('/Liste_joueurs');
				}
				
			} else {
				// @ts-ignore
				console.log(res.message);
			}
		} catch (error) {
			console.log(error);
		}
	};
	const createPostePerssonne = async (/** @type {string | Blob} */ id_joueur,/** @type {string | Blob} */ id_poste) => {
		try {
		
			//On crée le User
			const updateRoute = _servicepath + 'creation_postePersonne.php';
			const data = new FormData();


			
			data.append('id_personne', id_joueur);
			data.append('id_poste', id_poste);
			data.append('annee', annee);
			
			
			let res = await fetch(updateRoute, {
				method: 'POST',
				body: data
			});

			console.log('avant requete')
			res = await res.json();

			console.log(res);
			// @ts-ignore
			if (res.status == '1') {
				console.log('requete ok');
				creationOk = true;
				
			} else {
				// @ts-ignore
				console.log(res.message);
			}
		} catch (error) {
			console.log(error);
		}
	};

	const createEquipePerssonne = async (/** @type {string | Blob} */ id_joueur,/** @type {string | Blob} */ id_equipe,/** @type {string | Blob} */ id_categorie) => {
		try {
		
			//On crée le User
			const updateRoute = _servicepath + 'creation_EquipePersonne.php';
			const data = new FormData();


			
			data.append('id_personne', id_joueur);
			data.append('id_equipe', id_equipe);
			data.append('id_categorie', id_categorie);
			data.append('annee', annee);
			
			
			let res = await fetch(updateRoute, {
				method: 'POST',
				body: data
			});

			console.log('avant requete')
			res = await res.json();

			console.log(res);
			// @ts-ignore
			if (res.status == '1') {
				console.log('requete ok');
				creationOk = true;
				
			} else {
				// @ts-ignore
				console.log(res.message);
			}
		} catch (error) {
			console.log(error);
		}
	};
</script>

<Card class="styleCardFormulaire">
	<Row>
		<h1>Creation d'une personne</h1>
	</Row>
	<Row>
		{#if creationOk}
			<Alert color="success">Création effectué avec succes</Alert>
		{/if}
	</Row>
	<form id="frmCreationPersonne" class="formulaireClassique" on:submit|preventDefault={createPersonne}>
		<Row>
			<Col xl="6" style="margin-top:15px;">
				<Label for="dd_typePersonne">Type de personne à créer :</Label>
				<Input type="select" id="dd_typePersonne" bind:value={type_personne}>
					<option value="2" selected>Joueur</option>
					<option value="3">Parent</option>
					<option value="1">Coach</option>
					<option value="5">Dirigeant</option>
					<option value="4">Admin</option>
				</Input>
			</Col>
		</Row>
		<Row>
			<Col xl="6">
				<Label for="iPhoto">Photo de la personne :</Label>
				<Input name="iPhoto" type="file" />
				<Label for="iNom">Nom :</Label>
				<Input name="iNom" type="text"  bind:value={nom} />
				<Label for="iPrenom">Prénom :</Label>
				<Input name="iPrenom" type="text"  bind:value={prenom} />
				<Label for="iLicence">Numéro licence :</Label>
				<Input name="iLicence" type="number"  bind:value={licence} />
				<Label for="iTel">Telephone :</Label>
				<Input name="iTel" type="text"  bind:value={tel} />
				<Label for="iMail">E-mail :</Label>
				<Input name="iMail" type="email"  bind:value={mail} />
			</Col>
		</Row>
		<Row>
			{#if type_personne == '2'}
				<h4>Creation d'un joueur</h4>
				<Row>
					<Col xl="6">
						<Label for="dd_date_Personne">date de naissance :</Label>
						<Input type="date" id="dd_date_Personne" placeholder="date placeholder" bind:value={date_naissance} />
					</Col>
				</Row>
				<Row>
					<Col xl="6">
						<Label for="dd_categorie">Categorie :</Label>
						<Input type="select" name="" id="dd_categorie" bind:value={id_categorie}>
							<option value="1">U6</option>
							<option value="2">U7</option>
							<option value="3">U8</option>
							<option value="4">U9</option>
							<option value="5">U10</option>
							<option value="6">U11</option>
							<option value="7">U12</option>
							<option value="8">U13</option>
						</Input>
					</Col>
				</Row>
				<Row>
					<Col xl="6">
						<Label for="dd_equipe">Equipe :</Label>
						<Input type="select" name="" id="dd_equipe" bind:value={id_equipe}>
							<option value="1">Criterium</option>
							<option value="2">Niveau 1</option>
							<option value="3">Niveau 2</option>
							<option value="4">Groupe A</option>
							<option value="5">Groupe C</option>
							<option value="6">Groupe B</option>
							<option value="7">Groupe C</option>
						</Input>
					</Col>
				</Row>
				<Row>
					<Col xl="6">
						<Label for="dd_postPersonne">Poste Joueur :</Label>
						<Input type="select" name="" id="dd_postPersonne" bind:value={poste1}>
							<option value="1">Gardien de but</option>
							<option value="2">Defenseur Central</option>
							<option value="3">Arrière Droit</option>
							<option value="4">Arrière Gauche</option>
							<option value="5">Milieu defensif</option>
							<option value="6">Milieu offensif</option>
							<option value="7">Milieu relayeur</option>
							<option value="8">Milieu Droit</option>
							<option value="9">Milieu Gauche</option>
							<option value="10">Attaquant</option>
							<option value="11">Attaquant Gauche</option>
							<option value="12">Attaquant Droit</option>
						</Input>
					</Col>
				</Row>
				<Row>
					<Col xl="6">
						<Label for="dd_postPersonne2">Poste Joueur 2 :</Label>
						<Input type="select" name="" id="dd_postPersonne2" bind:value={poste2}>
							<option value="1">Gardien de but</option>
							<option value="2">Defenseur Central</option>
							<option value="3">Arrière Droit</option>
							<option value="4">Arrière Gauche</option>
							<option value="5">Milieu defensif</option>
							<option value="6">Milieu offensif</option>
							<option value="7">Milieu relayeur</option>
							<option value="8">Milieu Droit</option>
							<option value="9">Milieu Gauche</option>
							<option value="10">Attaquant</option>
							<option value="11">Attaquant Gauche</option>
							<option value="12">Attaquant Droit</option>
						</Input>
					</Col>
				</Row>
				<Label for="dd_annee">Saison :</Label>
				<Input type="text" id="dd_annee" bind:value={annee} style="width:150px;"></Input>
				
			{/if}

			{#if type_personne == '1'}
				<h4>Creation d'un coach</h4>
				<Row>
					<Col xl="6">
						<Label for="dd_date_Personne">date de naissance :</Label>
						<Input type="date" placeholder="date placeholder" />
					</Col>
				</Row>
			{/if}

			{#if type_personne == '4'}
				<h4>Creation d'un admin</h4>
			{/if}
		</Row>

		<Row>
			<Col>
				<Button type="submit">Enregistrer</Button>
			</Col>
		</Row>
	</form>
</Card>
