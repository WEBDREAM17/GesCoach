<script>
	import {
		Row,
		Col,
		Label,
		Input,
		Button,
		Card,
		
	} from '@sveltestrap/sveltestrap';
    import { onMount } from "svelte";
	import { _servicepath } from '../../store';
	import { isAuthenticated } from "../../store";

    let id_coach = '';
	let type_evenement = '';
	let validated = false;
	let nom_evenement = '';
	let debut_evenement = '';
	let fin_evenement = '';
    let description_evenement = '';
    let duree = '0';
    let prix = '0.00';
    /**
	 * @type {any[]}
	 */
    let listeCoach = [];
	let errorMessage = '';
    /**
	 * @type {any[]}
	 */
    let listeTypeEvenement =[];

    onMount ( async()=> {
		if(!$isAuthenticated)
		{
			goto('/Accueil');
		}
		else{
			await recupererTypeEvenement();
        	await recupererListeCoach();
		}
	})

    const recupererTypeEvenement = async () => {
		try {
			//On recupere un evenement
			const updateRoute = _servicepath + 'recuperer_typeEvenement.php';
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
				listeTypeEvenement = res.data;
				
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
	const createEvenement = async () => {
		try {
            console.log('id coach : '+ id_coach)
            
			//On crée le User
			const updateRoute = _servicepath + 'creation_evenement.php';
			const data = new FormData();

			data.append('type_evenement', type_evenement);
			data.append('nom_evenement', nom_evenement);
			data.append('debut_evenement', debut_evenement.replace('T',' '));
			data.append('fin_evenement', fin_evenement.replace('T',' '));
            data.append('description_evenement', description_evenement);
            data.append('duree', duree);
            data.append('prix', prix);
            data.append('id_coach', id_coach);
			
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
			} else {
				// @ts-ignore
				console.log(res.message);
			}
		} catch (error) {
			console.log(error);
		}
	};

    function VoirValeur(){
        console.log('id coach : '+id_coach)
    }
</script>

<Card class="styleCardFormulaire">
	<Row>
		<h1>Creation d'un évènement</h1>
	</Row>
	<form id="frmCreationPersonne" class="formulaireClassique" on:submit|preventDefault={createEvenement}>
		<Row>

			<Col xl="6" style="margin-top:15px;">
                <Label for="dd_coachEvenement">Nom du coach organisateur ::</Label>
				<Input type="select" id="dd_coachEvenement" bind:value={id_coach} on:change={VoirValeur} required>
                    <option value='-1'></option>
                    {#each listeCoach as coach}
                    <option value={coach.id}>{coach.nom}</option>
                    {/each }
				</Input>
				<Label for="dd_typeEvenement">Type d'évènement :</Label>
				<Input type="select" id="dd_typeEvenement" bind:value={type_evenement} required>
                    <option value='-1'></option>
                    {#each listeTypeEvenement as evenement}
                    <option value={evenement.id}>{evenement.nom_type}</option>
                    {/each }
				</Input>
                <Label for="dd_nomEvenement">Nom de l'évènement :</Label>
				<Input type="text" id="dd_nomEvenement" bind:value={nom_evenement}>
                </Input>

				<Label for="dd_nomEvenement">Description de l'évènement :</Label>
				<Input type="textarea" id="dd_descEvenement" bind:value={description_evenement}>
                </Input>

                <Label for="dd_debutEvenement">Début de l'évènement :</Label>
				<Input type="datetime-local" id="dd_debutEvenement" bind:value={debut_evenement}>
                </Input>

                <Label for="dd_finEvenement">Fin del'évènement :</Label>
				<Input type="datetime-local"id="dd_finEvenement" bind:value={fin_evenement}/>

		     <Label for="dd_prixEvenement">Prix :</Label>
				<Input type="text"id="dd_prixEvenement" bind:value={prix}/>
		
				<button type="submit" on:click={() => (validated = true)}>Enregistrer</button>
            </Col>
		</Row>
	</form>
</Card>
<style>
	h1{
		text-align: center;
		font-size: 5rem;
		margin-top: 20px;
	}
	.formulaireClassique {
		margin: 20px ;
	}
	button {
		margin: 30px 0;
		padding: 10px 20px;
		border-radius: 10px;
		background-color: gainsboro;
		color: black;
	}
</style>
