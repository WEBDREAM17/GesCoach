<script>
	import { Container, Image, Col, Row, Card, CardBody,CardHeader, CardTitle, CardSubtitle,Button,CardText} from "@sveltestrap/sveltestrap";
	import { onMount } from "svelte";
    import { page} from '$app/stores';

    const thumbnails = [
    'https://picsum.photos/100/100?random=1',
    'https://picsum.photos/100/100?random=2',
    'https://picsum.photos/100/100?random=3'
  ];

    let liste_coach = [];
    let _servicepath = 'http://localhost/webservice/';

    onMount ( async()=> {
		await recupererCoach();

	})

    const recupererCoach = async () => {
		try {
			//On crée le User
			const updateRoute = _servicepath + 'recuperer_personnes.php';
			const data = new FormData();
			data.append('id_statut','1');
			let res = await fetch(updateRoute, {
				method: 'POST',
				body: data
			});

			console.log('avant requete')
			res = await res.json();

			console.log(res);
			// @ts-ignore
			if (res.status == '1') {
				liste_coach = res.data;
               
				
			} else {
				// @ts-ignore
				console.log(res.message);
			}
		} catch (error) {
			console.log(error);
		}
	};
</script>
<Image  fluid alt="This is a fluid Image" src="src/lib/images/3.jpg" />
<tr></tr>
<h1 style="margin-top: 50px; text-align:center;font-size:4rem;">Nos Programmes</h1>
<div style="display:flex; justify-content:center;" class="horizontal">
  {#each thumbnails as thumbnail}
    <Image style="width:300px; margin: 30px;" data-bs-theme="dark" thumbnail alt="This is a thumbnail Image" src={thumbnail} />
  {/each}
</div>
