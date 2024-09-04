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
      <ul>
        <li style="list-style:none; margin-bottom:20px;" ><a style="font-size:2.5rem; color:black; text-decoration:none; " href="/">U10</a></li>
        <li style="list-style:none; margin-bottom:20px;"><a style="font-size:2.5rem; color:black; text-decoration:none;" href="/">U11</a></li>
        <li style="list-style:none; margin-bottom:20px;"><a style="font-size:2.5rem; color:black; text-decoration:none;" href="/">U12</a></li>
        <li style="list-style:none;"><a style="font-size:2.5rem; color:black; text-decoration:none;" href="/">U13</a></li>
      </ul>
      <img src="src/lib/images/20.png" alt="">
    </CardText>
  </CardBody>

  <CardBody>
  <CardSubtitle style="color:aqua; font-size:2.5rem; margin-top:20px;  padding:20px;border:solid black;text-align:center;">LES TOURNOIS</CardSubtitle>
  <CardText style="display:flex; align-items:center; justify-content:space-between;margin: 10px 30px; ">
    <ul>
      <li style="list-style:none; margin-bottom:20px;" ><a style="font-size:2.5rem; color:black; text-decoration:none; " href="/">Tournois U8</a></li>
      <li style="list-style:none; margin-bottom:20px;" ><a style="font-size:2.5rem; color:black; text-decoration:none; " href="/">Tournois U9</a></li>
      <li style="list-style:none; margin-bottom:20px;" ><a style="font-size:2.5rem; color:black; text-decoration:none; " href="/">Tournois U10</a></li>
      <li style="list-style:none; margin-bottom:20px;"><a style="font-size:2.5rem; color:black; text-decoration:none;" href="/">Tournois U11</a></li>
      <li style="list-style:none; margin-bottom:20px;"><a style="font-size:2.5rem; color:black; text-decoration:none;" href="/">Tournois U12</a></li>
      <li style="list-style:none;"><a style="font-size:2.5rem; color:black; text-decoration:none;" href="/">Tournois U13</a></li>
    </ul>
    <img src="src/lib/images/20.png" alt="">
  </CardText>
  <Button style="width:400px; margin-left:30px; color:aqua; font-size:2rem;">Voir tous nos tournois</Button>
</CardBody>

<CardBody>
    <CardSubtitle style="color:aqua; font-size:2.5rem; padding:20px;border:solid black;text-align:center;">LES STAGES</CardSubtitle>
    <CardText style="display:flex; align-items:center; justify-content:space-between;margin: 10px 30px; ">
      <ul>
        <li style="list-style:none; margin-bottom:30px;" ><a style="font-size:2.5rem; color:black; text-decoration:none; " href="/">Vacances</a></li>
        <li style="list-style:none; margin-bottom:30px;" ><a style="font-size:2.5rem; color:black; text-decoration:none; " href="/">Vacances</a></li>
        <li style="list-style:none; margin-bottom:30px;" ><a style="font-size:2.5rem; color:black; text-decoration:none; " href="/">Vacances</a></li>
        <li style="list-style:none; margin-bottom:30px;"><a style="font-size:2.5rem; color:black; text-decoration:none;" href="/">Vacances</a></li>
        <li style="list-style:none;"><a style="font-size:2.5rem; color:black; text-decoration:none;" href="/">Vacances</a></li>
      </ul>
      <img src="src/lib/images/20.png" alt="">
    </CardText>
    <Button style="width:400px; margin-left:30px; color:aqua; font-size:2rem;" >S'inscrire à nos stages de perfectionnement</Button>
  </CardBody>
  
  <CardBody>
    <CardSubtitle style="color:aqua; font-size:2.5rem; padding:20px; border:solid black;text-align:center;">LES SPECIFIQUES</CardSubtitle>
    <CardText style="display:flex; align-items:center; justify-content:space-between; margin:10px 30px; ">

      <div style ="display:flex; flex-direction:column; margin-top:50px;">
        <img style="width:350px; height:250px;" src="src/lib/images/tableau-tactif-sport.jpg" alt="" >
        <a style="font-size:2rem; color:black; text-decoration:none;"  href="/">Spécifiques aux postes</a>
      </div>
      <div style ="display:flex; flex-direction:column; margin-top:50px;">
        <img style="width:350px; height:250px;" src="src/lib/images/technique_foot.jpg" alt="" >
        <a style="font-size:2rem; color:black; text-decoration:none;"  href="/">Spécifiques Techniques</a>
      </div>
      <div style ="display:flex; flex-direction:column; margin-top:50px;">
        <img style="width:350px; height:250px;" src="/src/lib/images/7.jpg" alt="" >
        <a style="font-size:2rem; color:black; text-decoration:none;"  href="/">Prépartion Pysiques</a>
      </div>
      <div style ="display:flex; flex-direction:column; margin-top:50px; ">
        <img style="width:350px; height:250px;" src="src/lib/images/mental.jpeg" alt="" >
        <a style="font-size:2rem; color:black; text-decoration:none; text-align:center;"  href="/">Prépartion Mentales</a>
      </div>
      
    </CardText>
    <Button style="width:400px; margin-left:30px; color:aqua; font-size:2rem;" >Deviens la meilleure version de toi même</Button>
  </CardBody>
</Card>