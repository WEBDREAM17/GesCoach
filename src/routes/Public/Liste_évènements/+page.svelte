<script>
	import { Image, CardHeader, CardTitle} from "@sveltestrap/sveltestrap";
	import { onMount } from "svelte";
  import { page} from '$app/stores';

  let _servicepath = 'http://localhost/webservice/';
  let liste_evenements = [];

  onMount(async () => {
		await recupererListeEvenements();
		await creation_utilisateur();
	});

	const creation_utilisateur = async () => {
		try {
			//On crée le User
			const updateRoute = _servicepath + 'recuperer_liste_evenements.php';
			const data = new FormData();

			let res = await fetch(updateRoute, {
				method: 'POST',
				body: data
			});

			console.log('avant requete');
			res = await res.json();

			console.log(res);
			// @ts-ignore
			if (res.status == '1') {
				liste_evenements = res.data;
				console.log(liste_evenements);
			} else {
				// @ts-ignore
				console.log(res.message);
			}
		} catch (error) {
			console.log(error);
		}
	};


    const thumbnails = [
      ['/images/image 4.png','Stages'],
      ['/images/image 7.png','Specifique'],
      ['/images/image 5.png','Preparation mentale'],
     
    
  ];
</script>  
<div class="cardHeader">
	<h1 class="title">Nos évènements</h1>
	</div>
<div class="cardBody">
  {#each thumbnails as thumbnail}
   <a href="{thumbnail[1]}" target="_blank">
	<img src={thumbnail[0]} />
</a>
  {/each}
</div>
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
      margin: 50px;
	  display:flex; 
	  justify-content:space-around;
	  align-items:center;
	  gap: 20px;
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

   
