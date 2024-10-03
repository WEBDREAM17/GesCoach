<script>
	import { CardBody,Button,Table,Modal,ModalFooter,ModalHeader} from "@sveltestrap/sveltestrap";
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


  <CardBody style="width:1000px; margin: 50px 30px;">
  
    <h1>Liste des Equipes</h1>
      <Table bordered >
        <thead>
          <tr>
          <th>Categorie</th>
          <th>Equipe</th>
          <th>nom du Coach</th>
		  <th>Effectif</th>
		  <th>Action</th>
          </tr>
        </thead>
        <tbody>
          {#each listeEquipeCoach as equipeCoach}
          <tr>
          <td>{equipeCoach.nom_categorie}</td>
          <td>{equipeCoach.nom_equipe}</td>
          <td>{equipeCoach.nomCoach}</td>
          <td><a href="/Admin/Fiche_equipes?id_equipe={equipeCoach.id}&id_categorie={equipeCoach.id_categorie}" >Effectif</a></td>
          <td><Button on:click={()=>toggleSuppression(equipeCoach.id, equipeCoach.id_categorie)} style="border:0px;background-color:transparent;color:red;text-decoration:underline;margin:0 auto;padding:0 auto;">supprimer</Button></td>
          </tr>
         {/each}
        </tbody>
	</Table>
  </CardBody>
  <div>
	<Modal isOpen={openSuppression} backdrop={false}>
	  <ModalHeader>Etes vous sûr de vouloir supprimer cet équipe ?</ModalHeader>
	  
	  <ModalFooter>
		<Button color="primary" on:click={supprimer_equipe}>Supprimer</Button>
		<Button color="secondary" on:click={()=>toggleSuppression('-1')}>Annuler</Button>
	  </ModalFooter>
	</Modal>
  </div>
   <style>
	h1{
		margin-top: 100px;
		text-align: center;
		color: aliceblue;
		font-size: 5rem;
		margin-bottom: 50px;
	}
	/* table {
		
		margin: 20px auto;
		border: solid black 2px;
		text-align: center;
	}
	thead {
		margin: 20px auto;
		border: solid black 2px;
		padding: 10px 20px;
		text-align: center;
	}
	tr{
		margin: 20px auto;
		border: solid black 2px;
		padding: 10px 20px;
		text-align: center;
	}
	th{
		margin: 20px auto;
		border: solid black 2px;
		padding: 10px 20px;
		text-align: center;
	}
	td {
		margin: 20px auto;
		border: solid black 2px;
		padding: 10px 20px;
		text-align: center;
	} */

   </style> 
 
 
  

