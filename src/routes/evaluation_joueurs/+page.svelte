<script>
	import { Card, CardBody, CardHeader, Input, Label,ButtonToolbar,ButtonGroup,Button } from "@sveltestrap/sveltestrap";
	import { onMount } from "svelte";
    import { page} from '$app/stores';

	let nomJoueur='Ribault';
	let prenomJoueur='Raphaël';
	let noteEndurance = 5;

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
		let id_joueur =$page.url.searchParams.get('id');
        await recupererJoueur(id_joueur);

	})
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
    <Card>
		<CardHeader>
			<h1>Evaluation de {prenomJoueur} {nomJoueur}</h1>
			<strong>Toutes les notes sont sur 10 points</strong>
		</CardHeader>
		<CardBody>
			<h3>Critères Physiques</h3>
			<Label for="iEndurance">Endurance : {noteEndurance}/10</Label>
			<Input type="range" min={0} max={10} step={1} placeholder="range placeholder" bind:value={noteEndurance} />
			<Label for="iEndurance">Motricité : </Label>
			
			<Label for="iEndurance">Force : </Label>
			<Input type="text"/>
			<Label for="iEndurance">Vitesse : </Label>
			<Input type="text"/>
	
			<h3>Critères Techniques</h3>
			<Label for="iEndurance">Drible : </Label>
			<Input type="text"/>
			<Label for="iEndurance">Passe : </Label>
			<Input type="text"/>
			<Label for="iEndurance">Transversale : </Label>
			<Input type="text"/>
	
			<h3>Comportement</h3>
			<Label for="iEndurance">Assiduité : </Label>
			<Input type="text"/>
			<Label for="iEndurance">Respect : </Label>
			<Input type="text"/>
			<Label for="iEndurance">Leadership : </Label>
			<Input type="text"/>
		</CardBody>
	</Card>