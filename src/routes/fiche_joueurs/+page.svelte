<script>
	import { Table, Col, Row} from "@sveltestrap/sveltestrap";
	import { onMount } from "svelte";
    import { page} from '$app/stores';

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
    <h1>{nom} {prenom}</h1>
    <h3>{date}</h3>
	<p>{categorie} {equipe}</p>
	<p>{poste1} {poste2} </p>