<script>
	import { Image,} from "@sveltestrap/sveltestrap";
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

</script>  


{#each liste_evenements as evenement}
{@html evenement.description}
{/each}
