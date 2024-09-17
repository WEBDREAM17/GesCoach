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
<!-- <Card>
  <CardHeader>
    <CardTitle style="font-size:4rem; margin: 10px 50px;">Notre staff</CardTitle>
  </CardHeader>
  <CardBody style="background-color:gray; display:flex; align-items:center; justify-content:space-between; margin:50px 50px;">
      <img src="src/lib/images/20.png" alt="">
      <div>
        <h2 style="font-size:3rem; color:white;">Le staff</h2>
        <p style="font-size:1.2rem;width:600px;">Un club de football, c'est des joueurs, mais aussi un groupe d'entraineurs bénévole au service du club.</p>
      </div>
  </CardBody>
  <CardBody>
  <CardSubtitle style="color:black; font-size:2.5rem; margin:0 30px; padding:20px; border:solid black; text-align:center;">Ecole de football</CardSubtitle>
  <CardText style="display:flex; align-items:center; justify-content:space-between; margin: 10px 30px;">
    <ul>
      {#each liste_coach as coach}
      <li>{coach.nom}<a href="">fiche Coach</a></li>
      {/each}
    </ul>
    <img src="src/lib/images/20.png" alt="">
  </CardText>
</CardBody>
<CardBody>
    <CardSubtitle style="color:black; font-size:2.5rem; margin:0 30px; padding:20px;border:solid black;text-align:center;">Pole Préformation</CardSubtitle>
    <CardText style="display:flex; align-items:center; justify-content:space-between;margin: 10px 30px;">
      <ul>
        {#each liste_coach as coach}
      <li>{coach.nom}<a href="">fiche Coach</a></li>
      {/each}
      </ul>
      <img src="src/lib/images/20.png" alt="">
    </CardText>
  </CardBody>
  <CardBody>
    <CardSubtitle style="color:black; font-size:2.5rem; margin:0 30px; padding:20px; border:solid black;text-align:center;">Pole ambition</CardSubtitle>
    <CardText style="display:flex; align-items:center; justify-content:space-between;margin: 10px 30px;; ">
      <ul>
        {#each liste_coach as coach}
        <li>{coach.nom}<a href="">fiche Coach</a></li>
        {/each}
      </ul>
      <img src="src/lib/images/20.png" alt="">
    </CardText>
  </CardBody>
</Card> -->