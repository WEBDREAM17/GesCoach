<script>
	import { Container, Image, Col, Row, Card, CardBody,CardHeader, CardTitle, CardSubtitle,Button,CardText, Table,Modal,ModalFooter,ModalHeader} from "@sveltestrap/sveltestrap";
	import { onMount } from "svelte";
    import { page} from '$app/stores';

	let openSuppression = false;
	let id_equipe='';
  	const toggleSuppression = (/** @type {string} */ id_equipe_param, id_categorie_param) => {
		console.log('id eq param : ' + id_equipe_param);
		id_equipe = id_equipe_param;
		id_categorie = id_categorie_param;
		openSuppression = !openSuppression
	};

    let nom_categorie = '';
	let id_coach = ''; 
	let id_categorie = ''; 
	let id_joueur = '';
	let nom_equipe = '';
	let annee = '';
	let annee2= 0;
	let nom = '';
    
	/**
	 * @type {any[]}
	 */
	let listeCoach = [];
	let liste_niveauEquipe = [];

	
	let validated = false;

    /**
	 * @type {any[]}
	 */
  let listeEquipe = [];
  let listeEquipeCoach = [];
	let errorMessage = '';
    /**
	 * @type {any[]}
	 */
  let listeCategorie = [];
	let _servicepath = 'http://localhost/webservice/';

    onMount ( async()=> {
		await recupererNiveauEquipe();
		await recupererListeEquipe();
		await recupererListeCategorie();
		await recupererListeCoach();
		await recupererListeEquipeCoach();
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
	const supprimer_equipe = async () => {
		try {

			//On crée le User
			const updateRoute = _servicepath + 'supprimer_equipe.php';
			const data = new FormData();
			data.append('id_equipe', id_equipe);
			data.append('id_categorie', id_categorie);
			let res = await fetch(updateRoute, {
				method: 'POST',
				body: data
			});

			console.log('avant requete' + id_equipe);
			res = await res.json();

			
			// @ts-ignore
			if (res.status == '1') {
				//On faut disparaitre la modal de confirmation
				toggleSuppression('-1');

				//On actualise la liste
				await recupererListeEquipeCoach();
				
			} else {
				// @ts-ignore
				console.log(res.message);
			}
		} catch (error) {
			console.log(error);
		}
	};
	const recupererListeEquipeCoach = async () => {
		try {
			//On recupere un evenement
			const updateRoute = _servicepath + 'recuperer_listeEquipeCoach.php';
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
				listeEquipeCoach = res.data;
				
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
	const recupererNiveauEquipe = async () => {
		try {
			//On crée le User
			const updateRoute = _servicepath + 'recuperer_niveauEquipe.php';
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
				liste_niveauEquipe = res.data;
				console.log(liste_niveauEquipe);
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
</script>  

  <CardHeader style="background-color:black">
    <CardTitle style="font-size:4rem; margin: 10px 30px; color:grey;">Nos équipes - Le Parc Football Club</CardTitle>
  </CardHeader>
  <CardBody style="width:1000px; margin: 50px 30px;">
    <Col><p style="font-size:1.3rem;">
      Bienvenue sur notre page dédiée à nos équipes. Ici, à l’Association de Football le Parc Football club, nous sommes fiers de notre gamme d’équipes, de U6 à U13. Chaque équipe est unique, mais toutes partagent notre engagement envers le sport, le respect, l’amusement et le développement personnel.</p></Col>
    <Col>
      <h2 style="font-size:1.7rem; margin-top:50px;">Les U6</h2>
      <p style="font-size:1.3rem;">Notre équipe U6 est l’endroit idéal pour les débutants. En U6, le jeu se joue en format 2 vs 2, 3 vs 3 et 5 vs 5 pour permettre un maximum de participation. L’accent est mis sur le plaisir, le développement des compétences de base, la créativité et l’introduction à l’esprit d’équipe.</p></Col>
    <Col>
      <h2 style="font-size:1.7rem; margin-top:50px;">Les u7</h2>
      <p style="font-size:1.3rem;">En U7, nos joueurs continuent à développer leurs compétences tout en apprenant à jouer en équipe. Les règles sont similaires à celles de U6, avec des matches joués également en format 3 vs 3, 5 vs 5, et un accent renouvelé sur l’amusement et l’apprentissage.</p>
    </Col>
    <Col>
    <h2 style="font-size:1.7rem; margin-top:50px;">Les U8</h2>
    <p style="font-size:1.3rem;">Pour notre équipe U8, les règles commencent à évoluer. Les matches sont joués en format 5 vs 5, mais avec des objectifs plus grands et une légère augmentation de la taille du terrain. C’est une année excitante pour le développement des compétences et la compréhension du jeu.</p>
    </Col>
    <Col>
      <h2 style="font-size:1.7rem; margin-top:50px;">Les U9</h2>
      <p style="font-size:1.3rem;">L’équipe U9 s’aventure dans des matches plus compétitifs, tout en continuant à se concentrer sur le développement des compétences et le plaisir du jeu. Les matches se jouent en format 5 vs 5 ou 8 vs 8, introduisant une nouvelle dimension de stratégie et de coopération.</p>
    </Col>
    <Col>
      <h2 style="font-size:1.7rem; margin-top:50px;">Les U10</h2>
      <p style="font-size:1.3rem;">L’équipe U10 continue à construire sur les compétences et les concepts introduits dans les niveaux précédents. Les matches se jouent en format 8 contre 8, avec un accent sur l’amélioration technique et la compréhension tactique du jeu.</p>
    </Col>
    <Col>
      <h2 style="font-size:1.7rem; margin-top:50px;">Les U11</h2>
      <p style="font-size:1.3rem;">En U11, nos joueurs commencent à appliquer leurs compétences et leurs connaissances dans un format de match plus complexe de 8 vs 8. L’accent est mis sur le travail d’équipe, la stratégie et le développement continu des compétences techniques et tactiques.</p>
    </Col>
    <Col>
      <h2 style="font-size:1.7rem; margin-top:50px;">Les U12</h2>
      <p style="font-size:1.3rem;">Les joueurs de l’équipe U12 continuent à développer leur compréhension du jeu et leurs compétences dans un environnement compétitif. Le format est toujours 8 vs 8, préparant les joueurs à l’expérience du football à 11 contre 11 qu’ils rencontreront en U13.</p>
    </Col>
    <Col>
      <h2 style="font-size:1.7rem; margin-top:50px;">Les U13</h2>
      <p style="font-size:1.3rem;">Notre équipe U13 est le sommet de notre parcours de développement. Les matches se jouent 8 vs 8 en debut d'année, au fil du temps nous passeront à 9 vs 9 jusqu'à arriver à du 11 vs 11 sur un terrain plus grand. À ce stade, nos joueurs ont développé un excellent ensemble de compétences et une compréhension approfondie du jeu.

        Chaque équipe du Parc Fc a sa propre personnalité et ses propres objectifs, mais toutes partagent l’amour du jeu et le désir de s’améliorer. Nous sommes impatients de vous voir soutenir nos équipes pour la saison 2024-2025 !</p>
    </Col>

    <h1 style="margin-top: 80px;">Liste des Equipes</h1>
      <Table bordered>
        <thead>
          <tr>
          <th>Categorie</th>
          <th>Equipe</th>
          <th>nom du Coach</th>
          </tr>
        </thead>
        <tbody>
          {#each listeEquipeCoach as equipeCoach}
          <tr>
          <td>{equipeCoach.nom_categorie}</td>
          <td>{equipeCoach.nom_equipe}</td>
          <td>{equipeCoach.nomCoach}</td>
          </tr>
         {/each}
        </tbody>
        </Table>
  </CardBody>
  
    
 
 
  

