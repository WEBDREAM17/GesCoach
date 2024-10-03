<script>
	import { Card, CardBody, CardHeader, Input, Label,Row, Col,Button, Alert, Image } from "@sveltestrap/sveltestrap";
	import { onMount } from "svelte";
    import { page} from '$app/stores';

	let nomJoueur='Ribault';
	let prenomJoueur='Raphaël';
	let id_joueur ='2';
	let id_evaluateur='3';
	let evalTerminer = false;
	let url_photo='';
	let nom_coach=';'

    let noteAttitude = 5;
    let noteLeader = 5;
    let noteCompete = 5;
    let noteAssiduite=5;

    let noteDrible = 5;
    let noteConduite = 5;
    let notePasseC = 5;
    let notePasseL = 5;
    let notePiedFaible = 5;
    let noteTete = 5;
    let noteTir = 5;
    let noteTouche1 = 5;

    let noteCoordination = 5;
    let noteVitesse = 5;
    let noteEndurance = 5;
    let noteForce = 5;

    let noteJeuOff = 5;
    let noteJeuDef = 5;
    let noteVision = 5;
    let noteDecision = 5;


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
		id_joueur =$page.url.searchParams.get('id');
        await recupererJoueur(id_joueur);

	})
	const createEvalutionJoueur = async () => {
		try {
		
			//On crée le User
			const updateRoute = _servicepath + 'evaluation_joueur.php';
			const data = new FormData();


	data.append('nom_coach', nom_coach);	
	data.append('id_joueur', id_joueur);
    data.append('id_evaluateur', id_evaluateur);
    data.append('noteAttitude', noteAttitude.toString());
    data.append('noteAssiduite', noteAssiduite.toString());
    data.append('noteLeader', noteLeader.toString());
    data.append('noteCompete', noteCompete.toString());
    data.append('noteDrible', noteDrible.toString());
    data.append('noteConduite', noteConduite.toString());
    data.append('notePasseC', notePasseC.toString());
    data.append('notePasseL', notePasseL.toString());
    data.append('noteTir', noteTir.toString());
    data.append('notePiedFaible', notePiedFaible.toString());
    data.append('noteTete', noteTete.toString());
    data.append('noteTouche1', noteTouche1.toString());
    data.append('noteJeuOff', noteJeuOff.toString());
    data.append('noteJeuDef', noteJeuDef.toString());
    data.append('noteDecision', noteDecision.toString());
    data.append('noteVision', noteVision.toString());
    data.append('noteCoordination', noteCoordination.toString());
    data.append('noteVitesse', noteVitesse.toString());
    data.append('noteEndurance', noteEndurance.toString());
    data.append('noteForce', noteForce.toString());
			
			
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
				evalTerminer = true;

				
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
			data.append('id_personne',id_joueur);
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
				categorie = monJoueur.categorie;
				equipe = monJoueur.equipe;
				licence = monJoueur.numero_licence;
				poste1 = monJoueur.poste1;
				poste2 = monJoueur.poste2;


                if(date== null){
                    date='date non renseigné';
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
    
	<div class="identite">
		<img src="/src/lib/images/logo.png" alt="">
		<div class="info">
		<h3>Évaluer par</h3>
			<h1>{nom} {prenom}</h1>
			<a class="retour" href="/Admin/Liste_joueurs">Liste joueur</a>
			<strong>Toutes les notes sont sur 10 points</strong>
		</div>
		<img src="/{url_photo}" alt="">
	</div>
		
		<CardBody style=" padding:30px; margin:20px auto; border:3px solid black; display:flex; justify-content:space-between;">
			<div style="width: 800px;">
				<h3 style="color:red;">Critères Mentales</h3>
				<Label for="iEAttitude">Attitude (veut progresser): {noteAttitude}/10</Label>
				<Input type="range" min={0} max={10} step={1} placeholder="range placeholder" bind:value={noteAttitude} />
				<Label for="iLeader">Leadership :{noteLeader}/10 </Label>
				<Input type="range" min={0} max={10} step={1} placeholder="range placeholder" bind:value={noteLeader} />
				<Label for="iEndurance">Compétitivité : {noteCompete}/10</Label>
				<Input type="range" min={0} max={10} step={1} placeholder="range placeholder" bind:value={noteCompete} />
				<Label for="iEndurance">Assiduité : {noteAssiduite}/10</Label>
				<Input type="range" min={0} max={10} step={1} placeholder="range placeholder" bind:value={noteAssiduite} />
			</div>
			<Image style="width:400px;" fluid alt="This is a fluid Image" src="/src/lib/images/mental.jpeg" />
		</CardBody>
			
		<CardBody style=" padding:30px; margin:20px auto; border:3px solid black; display:flex; justify-content:space-between;align-items:center;">
			<div style="width: 800px;">
				<h3 style="color:red;">Critères Techniques</h3>
				<Label for="iEndurance">Drible : {noteDrible}/10</Label>
				<Input type="range" min={0} max={10} step={1} placeholder="range placeholder" bind:value={noteDrible} />
				<Label for="iEndurance">Conduite : {noteConduite}/10</Label>
				<Input type="range" min={0} max={10} step={1} placeholder="range placeholder" bind:value={noteConduite} />
				<Label for="iEndurance"> Passe courte : {notePasseC}/10</Label>
				<Input type="range" min={0} max={10} step={1} placeholder="range placeholder" bind:value={notePasseC} />
				<Label for="iEndurance"> Passe longue :{notePasseL}/10 </Label>
				<Input type="range" min={0} max={10} step={1} placeholder="range placeholder" bind:value={notePasseL} />
				<Label for="iEndurance"> 1e touche (contôle) :{noteTouche1}/10 </Label>
				<Input type="range" min={0} max={10} step={1} placeholder="range placeholder" bind:value={noteTouche1} />
				<Label for="iEndurance"> Tir :{noteTir}/10 </Label>
				<Input type="range" min={0} max={10} step={1} placeholder="range placeholder" bind:value={noteTir} />
				<Label for="iEndurance"> Tête : {noteTete}/10</Label>
				<Input type="range" min={0} max={10} step={1} placeholder="range placeholder" bind:value={noteTete} />
				<Label for="iEndurance"> Pied faible : {notePiedFaible}/10</Label>
				<Input type="range" min={0} max={10} step={1} placeholder="range placeholder" bind:value={notePiedFaible} />
			</div>
			<Image style="width:400px;height:400px;" fluid alt="This is a fluid Image" src="/src/lib/images/image 4.png" />
		</CardBody>		
					
		<CardBody style=" padding:30px; margin:20px auto; border:3px solid black; display:flex; justify-content:space-between;">
			<div style="width: 800px;">
				<h3 style="color:red;">Critères Physiques</h3>
				<Label for="iEndurance">Coordination : {noteCoordination}/10</Label>
				<Input type="range" min={0} max={10} step={1} placeholder="range placeholder" bind:value={noteCoordination} />
				<Label for="iEndurance">Vitesse: {noteVitesse}</Label>
				<Input type="range" min={0} max={10} step={1} placeholder="range placeholder" bind:value={noteVitesse} />
				<Label for="iEndurance">Endurance : {noteEndurance}</Label>
				<Input type="range" min={0} max={10} step={1} placeholder="range placeholder" bind:value={noteEndurance} />
				<Label for="iEndurance">Force : {noteForce}</Label>
				<Input type="range" min={0} max={10} step={1} placeholder="range placeholder" bind:value={noteForce} />
			</div>
			<Image style="width:400px; " fluid alt="This is a fluid Image" src="/src/lib/images/image 5.png" />
		</CardBody>	
			
		<CardBody style=" padding:30px; margin:20px auto; border:3px solid black; display:flex; justify-content:space-between;">
			<div style="width: 800px;">
				<h3 style="color:red;">Critères Tactique</h3>
				<Label for="iEndurance">Jeu défensif (marquage, couverture) : {noteJeuDef}</Label>
				<Input type="range" min={0} max={10} step={1} placeholder="range placeholder" bind:value={noteJeuDef} />
				<Label for="iEndurance">Jeu offensif (démarquage, implication) : {noteJeuOff}</Label>
				<Input type="range" min={0} max={10} step={1} placeholder="range placeholder" bind:value={noteJeuOff} />
				<Label for="iEndurance">Vision du jeu (levé la tête) : {noteVision}</Label>
				<Input type="range" min={0} max={10} step={1} placeholder="range placeholder" bind:value={noteVision} />
				<Label for="iEndurance">Prise de décision (choix de jeu) : {noteDecision}</Label>
				<Input type="range" min={0} max={10} step={1} placeholder="range placeholder" bind:value={noteDecision} />
			</div>
			<Image style="width:400px; " fluid alt="This is a fluid Image" src="/src/lib/images/tableau-tactif-sport.jpg" />
		</CardBody>		
           
        <h3>Commentaire générale</h3>
        <Row>
            <Col style="padding:30px; margin:20px 10px; border:3px solid black;"><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius odit perspiciatis, animi minima adipisci optio quia ea dolores magnam amet, tempora molestiae laudantium. Incidunt, deleniti inventore! Officia, vero culpa, optio qui dolorum esse similique modi expedita accusamus explicabo facere nihil, sequi nulla nobis natus dolor fugiat. Saepe ea blanditiis accusamus.</p></Col>
          </Row>
          <Row style="margin: 20px auto; gap:10px;">
            <Col style="border: 3px solid black; height:100px">Signature Coach</Col>
            <Col style="border: 3px solid black; height:100px">Signature Joueur</Col>
            <Col style="border: 3px solid black; height:100px">Signateur Parent(mineur)</Col>
            <Col style="border: 3px solid black; height:100px">Signature D. Sportif</Col>
          </Row>
		<Row>
			{#if evalTerminer}
			<Alert color="success">Evaluation effectuer</Alert>
		{:else}
			<Button color="primary" on:click={createEvalutionJoueur}>Enregistrer</Button>
			{/if}
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
				display: flex;
				flex-direction:column ;
			}
			.retour {
				background-color: rgb(147, 210, 255);
				padding: 10px 10px;
				color: black;
				border-radius: 10px;;
			}
			strong{
				font-size: 1rem;
			}
		</style>