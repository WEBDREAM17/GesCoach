<script>
	import { Container, Image, Col, Row, Card, CardBody,CardHeader, CardTitle, CardSubtitle,Button,CardText} from "@sveltestrap/sveltestrap";
	import { onMount } from "svelte";
  import { page} from '$app/stores';

  let _servicepath = 'http://localhost/webservice/';
  let liste_evenements = [];

  onMount(async () => {
		await recupererListeEvenements();
	});

	const recupererListeEvenements = async () => {
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
      ['src/lib/images/4.jpg','https://www.google.fr'],
      ['src/lib/images/3.jpg','https://www.google.fr'],
      ['src/lib/images/7.jpg','https://www.google.fr'],
      ['src/lib/images/9.jpg','https://www.google.fr']
    
  ];
</script>  
<div style="display:flex; justify-content:center;" class="horizontal">
  {#each thumbnails as thumbnail}
   <a href="{thumbnail[1]}" target="_blank"><Image style="width:300px; margin: 0 20px;"   data-bs-theme="dark" thumbnail alt="This is a thumbnail Image" src={thumbnail[0]} /></a>
  {/each}
  
</div>

{#each liste_evenements as evenement}
{@html evenement.description}
{/each}
   
