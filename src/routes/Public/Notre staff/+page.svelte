<script>
  import { Container, Image, Col, CardBody,CardHeader, CardTitle,Table, Button} from "@sveltestrap/sveltestrap";
  import { onMount } from "svelte";
  import { page} from '$app/stores';
  import { _servicepath } from '../../store';

  
	let id_coach = ''; 
	
    
	/**
	 * @type {any[]}
	 */
	let listeCoach = [];
	

	
	let validated = false;

    /**
	 * @type {any[]}
	 */
 
  let listeEquipeCoach = [];
	let errorMessage = '';
  let annee = '2024';
 
	

    onMount ( async()=> {
	
		await recupererListeCoach();
	
		annee=new Date().getFullYear().toString();
		//miseAjourAnnee();

	})
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

  <div class="cardHeader">
    <div class="title">Notre Staff - Le Parc Football Club</div>
  </div>
  <div class="cardBody">
  <p>Rencontrez l'équipe derrière l'équipe. Notre jeune staff est composé de professionnels et de jeunes passionnés qui sont dédiés au développement de nos joueurs, tant sur le terrain qu'en dehors.</p>
    
      <h2>Directeur Technique</h2>
      <p >Notre directeur technique apporte une richesse de connaissances et d’expérience, ayant joué et entraîné au plus haut niveau. Il est responsable de la supervision de tous les aspects de notre programme de football, de l’élaboration de la stratégie à la mise en œuvre des plans d’entraînement. </p>
    
      <h2>Entraîneurs</h2>
      <p >Chaque équipe du Parc FC est guidée par un entraîneur dédié qui possède une compréhension approfondie du jeu et une passion pour le développement des jeunes joueurs. Nos entraîneurs travaillent en étroite collaboration avec le directeur technique pour veiller à ce que tous les joueurs atteignent leur potentiel maximum.</p>
   
    <h2>Coordinateur Administratif</h2>
    <p>Notre coordinateur administratif est le moteur qui fait tourner Le Parc FC. De la coordination des horaires d’entraînement et des matches à la gestion des inscriptions, il assure le bon déroulement de toutes nos opérations.

      Chaque membre de notre staff joue un rôle crucial pour faire du Parc FC une association de football de premier plan. Nous sommes fiers de l’équipe que nous avons constituée et nous sommes impatients de vous voir nous rejoindre pour la saison 2024-2025 !</p>
    </div>
      <div class="cardHeader">
        <div class="title">Notre Staff - Le Parc Football Club</div>
      </div>
      <Table bordered>
        <thead>
          <tr>
          <th>Nom du coach</th>
		      
          </tr>
        </thead>
        <tbody>
          {#each listeCoach as Coach}
          <!-- {#each listeEquipeCoach as equipeCoach} -->
          <tr>
          <td>{Coach.nom}</td>
          
    
          <!-- <td><a href="/Fiche_equipes?id_equipe={equipeCoach.id}&id_categorie={equipeCoach.id_categorie}" >Effectif</a></td> -->
          <!-- <td><Button on:click={()=>toggleSuppression(equipeCoach.id, equipeCoach.id_categorie)} style="border:0px;background-color:transparent;color:red;text-decoration:underline;margin:0 auto;padding:0 auto;">supprimer</Button></td> -->
          </tr>
         <!-- {/each} -->
         {/each}
        </tbody>
        </Table>
      
 
  <style>
    .cardHeader{
      background-color:rgb(182, 219, 252);
      padding: 20px 10px;
      
    }
    .title {
      font-size:5rem;
       margin: 10px 30px; 
       color:black;
    }
    .cardBody {
      margin: 10px 30px;
    }
    h2{
      margin: 10px 0; 
      font-size:3rem; 
      color:black;
    }
    p{
      font-size:1.4rem;
      margin:20px;
  
    }
  </style>
 
 
  

