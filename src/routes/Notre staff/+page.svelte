<script>
	import { Container, Image, Col, Row, Card, CardBody,CardHeader, CardTitle, CardSubtitle,Button,CardText} from "@sveltestrap/sveltestrap";
	import { onMount } from "svelte";
    import { page} from '$app/stores';
</script>  
<Card>
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
      <li>Camal Moindjie <a href="">fiche Coach</a></li>
      <li>Camal Moindjie <a href="">fiche Coach</a></li>
      <li>Camal Moindjie <a href="">fiche Coach</a></li>
      <li>Camal Moindjie <a href="">fiche Coach</a></li>
    </ul>
    <img src="src/lib/images/20.png" alt="">
  </CardText>
</CardBody>
<CardBody>
    <CardSubtitle style="color:black; font-size:2.5rem; margin:0 30px; padding:20px;border:solid black;text-align:center;">Pole Préformation</CardSubtitle>
    <CardText style="display:flex; align-items:center; justify-content:space-between;margin: 10px 30px;">
      <ul>
        <li>Camal Moindjie <a href="">fiche Coach</a></li>
        <li>Camal Moindjie <a href="">fiche Coach</a></li>
        <li>Camal Moindjie <a href="">fiche Coach</a></li>
        <li>Camal Moindjie <a href="">fiche Coach</a></li>
      </ul>
      <img src="src/lib/images/20.png" alt="">
    </CardText>
  </CardBody>
  <CardBody>
    <CardSubtitle style="color:black; font-size:2.5rem; margin:0 30px; padding:20px; border:solid black;text-align:center;">Pole ambition</CardSubtitle>
    <CardText style="display:flex; align-items:center; justify-content:space-between;margin: 10px 30px;; ">
      <ul>
        <li>Camal Moindjie <a href="">fiche Coach</a></li>
        <li>Camal Moindjie <a href="">fiche Coach</a></li>
        <li>Camal Moindjie <a href="">fiche Coach</a></li>
        <li>Camal Moindjie <a href="">fiche Coach</a></li>
      </ul>
      <img src="src/lib/images/20.png" alt="">
    </CardText>
  </CardBody>
</Card>