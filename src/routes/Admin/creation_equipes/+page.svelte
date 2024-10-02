<script>
	import {
	
		Row,Col,Label,Input,Button,Card,
		
	} from '@sveltestrap/sveltestrap';
	import { goto } from '$app/navigation'
    import { onMount } from "svelte";

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
	let liste_joueurs = [];
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
	let _servicepath = 'http://localhost/webservice/';

    onMount ( async()=> {
		
		await recupererListeCategorie();
		await recupererListeEquipe();
		await recupererListeCoach();
		await recupererJoueur();
		annee=new Date().getFullYear().toString();
		miseAjourAnnee();

	})
	function miseAjourAnnee(){
		annee2=Number(annee)+1;
	}

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
			} else {
				// @ts-ignore
				console.log(res.message);
			}
		} catch (error) {
			console.log(error);
		}
	};
	const createEquipe = async () => {
		try {
            console.log('id coach : '+ id_coach)
            
			//On crée une equipe
			const updateRoute = _servicepath + 'creation_equipe.php';
			const data = new FormData();

			data.append('id_equipe', id_equipe);
			data.append('id_categorie', id_categorie );
			data.append('id_personne', id_coach );
			data.append('annee', '2024' );

			let res = await fetch(updateRoute, {
				method: 'POST',
				body: data
			});

			console.log('avant requete')
			console.log('params : ' + id_equipe + ' / ' + id_categorie + ' / ' + id_coach);
			res = await res.json();

			console.log(res);
			// @ts-ignore
			if (res.status == '1') {
				console.log('requete ok');
				goto('/Admin/Nos equipes');
			} else {
				// @ts-ignore
				console.log(res.message);
			}
		} catch (error) {
			console.log(error);
		}

		
	};

    function VoirValeur(){
       console.log('id cat : ' + id_categorie);
    }
</script>

<Card class="styleCardFormulaire">
	<Row>
		<h1>Creation d'une equipe</h1>
	</Row>
	<form id="frmCreationEquipe" class="formulaireClassique" on:submit|preventDefault={createEquipe}>
		<Row>

			<Col xl="6">
                <Label for="dd_categorieEquipe">Categorie l'equipe:</Label>
				<Input type="select" id="dd_categorieEquipe" bind:value={id_categorie} on:change={VoirValeur} required>
                    <option value='-1'></option>
					{#each listeCategorie as categorie}
                    <option value={categorie.id}>{categorie.nom_categorie}</option>
                    {/each }
				</Input>
				<Label for="dd_nomEquipe">Nom de l'equipe:</Label>
				<Input type="select" id="dd_nomEquipe" bind:value={id_equipe} required>
                    <option value='-1'></option>
                    {#each listeEquipe as equipe}
                    <option value={equipe.id}>{equipe.nom_equipe}</option>
                    {/each }
				</Input>
        
                <Label for="dd_nomCoach">Nom du Coach :</Label>
				<Input type="select" id="dd_nomCoach" bind:value={id_coach}>
					<option value='-1'></option>
                    {#each listeCoach as coach}
                    <option value={coach.id}>{coach.nom} {coach.prenom} </option>
                    {/each }
                </Input>
			
				<Label for="dd_annee">Saison :</Label>
				<Input type="text" id="dd_annee" bind:value={annee} on:change={miseAjourAnnee} style="width:150px;"></Input>/ {annee2}
			
				<Button type="submit" on:click={() => (validated = true)}>Enregistrer</Button>
            </Col>
		</Row>
	</form>
</Card>

<style>
	h1 {
		color: rgb(204, 231, 255);
		font-size: 5rem;
	}
</style>

