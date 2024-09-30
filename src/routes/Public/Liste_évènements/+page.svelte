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
      ['/src/lib/images/4.jpg','Stages'],
      ['/src/lib/images/3.jpg','Specifique'],
      ['/src/lib/images/7.jpg','Preparation physique'],
     
    
  ];
</script>  
<CardHeader style="background-color:black">
	<CardTitle style="font-size:4rem; margin: 10px 30px; color:grey;">Nos évènements</CardTitle
	>
</CardHeader>
<div style="display:flex; justify-content:center;" class="horizontal">
  {#each thumbnails as thumbnail}
   <a href="{thumbnail[1]}" target="_blank"><Image style="width:350px; height:350px;"data-bs-theme="dark" thumbnail alt="This is a thumbnail Image" src={thumbnail[0]} /></a>
  {/each}
</div>


   
