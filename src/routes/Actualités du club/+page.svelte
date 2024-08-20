<script>
	import { Container, Image, Col, Row, Card, CardBody,CardHeader, CardTitle, CardSubtitle,Button,CardText} from "@sveltestrap/sveltestrap";
	import { onMount } from "svelte";
    import { page} from '$app/stores';
</script>  
<Card>
  <CardHeader>
    <CardTitle style="font-size:4rem; margin: 10px 30px;">Les évènements sportif au Parc Fc</CardTitle>
  </CardHeader>
  <CardBody>
    <CardSubtitle style="color:aqua; font-size:2.5rem; border:solid black;text-align:center;">LES MATCHS DE CHAMPIONNAT</CardSubtitle>
    <CardText style="display:flex; align-items:center; justify-content:space-between; margin:10px 30px;">
      <p style="font-size:1.2rem; width:700px;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. </p>
      <img src="src/lib/images/20.png" alt="">
    </CardText>
  </CardBody>

  <CardBody>
  <CardSubtitle style="color:aqua; font-size:2.5rem; margin-top:20px;  padding:20px;border:solid black;text-align:center;">LES TOURNOIS</CardSubtitle>
  <CardText style="display:flex; align-items:center; justify-content:space-between;margin: 10px 30px; ">
    <p style="font-size:1.2rem; width:700px;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. </p>
    <img src="src/lib/images/20.png" alt="">
  </CardText>
  <Button style="width:400px; margin-left:30px; color:aqua; font-size:2rem;">Voir tous nos tournois</Button>
</CardBody>

<CardBody>
    <CardSubtitle style="color:aqua; font-size:2.5rem; padding:20px;border:solid black;text-align:center;">LES STAGES</CardSubtitle>
    <CardText style="display:flex; align-items:center; justify-content:space-between;margin: 10px 30px; ">
      <p style="font-size:1.2rem; width:700px;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. </p>
      <img src="src/lib/images/20.png" alt="">
    </CardText>
    <Button style="width:400px; margin-left:30px; color:aqua; font-size:2rem;" >S'inscrire à nos stages de perfectionnement</Button>
  </CardBody>
  
  <CardBody>
    <CardSubtitle style="color:aqua; font-size:2.5rem; padding:20px; border:solid black;text-align:center;">LES SPECIFIQUES</CardSubtitle>
    <CardText style="display:flex; align-items:center; justify-content:space-between;margin: 10px 30px;; ">
      <p style="font-size:1.2rem; width:700px;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. </p>
      <img src="src/lib/images/20.png" alt="">
    </CardText>
    <Button style="width:400px; margin-left:30px; color:aqua; font-size:2rem;" >Deviens la meilleure version de toi même</Button>
  </CardBody>
</Card>