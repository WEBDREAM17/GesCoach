<script>
	import { Container, Image, Col, CardBody,CardHeader, CardTitle,Table, Button} from "@sveltestrap/sveltestrap";
	import { onMount } from "svelte";
    import { page} from '$app/stores';
</script>  

  <CardHeader style="background-color:black">
    <CardTitle style="font-size:4rem; margin: 10px 30px; color:grey;">Notre Staff - Le Parc Football Club</CardTitle>
  </CardHeader>
  <CardBody style="width:1000px; margin: 50px 30px;">
    <Col><p style="font-size:1.3rem;">Rencontrez l'équipe derrière l'équipe. Notre jeune staff est composé de professionnels et de jeunes passionnés qui sont dédiés au développement de nos joueurs, tant sur le terrain qu'en dehors.</p></Col>
    <Col>
      <h2 style="font-size:1.7rem; margin-top:50px;">Directeur Technique</h2>
      <p style="font-size:1.3rem;">Notre directeur technique apporte une richesse de connaissances et d’expérience, ayant joué et entraîné au plus haut niveau. Il est responsable de la supervision de tous les aspects de notre programme de football, de l’élaboration de la stratégie à la mise en œuvre des plans d’entraînement. </p></Col>
    <Col>
      <h2 style="font-size:1.7rem; margin-top:50px;">Entraîneurs</h2>
      <p style="font-size:1.3rem;">Chaque équipe du Parc FC est guidée par un entraîneur dédié qui possède une compréhension approfondie du jeu et une passion pour le développement des jeunes joueurs. Nos entraîneurs travaillent en étroite collaboration avec le directeur technique pour veiller à ce que tous les joueurs atteignent leur potentiel maximum.</p>
    </Col>
    <Col>
    <h2 style="font-size:1.7rem; margin-top:50px;">Coordinateur Administratif</h2>
    <p style="font-size:1.3rem;">Notre coordinateur administratif est le moteur qui fait tourner Le Parc FC. De la coordination des horaires d’entraînement et des matches à la gestion des inscriptions, il assure le bon déroulement de toutes nos opérations.

      Chaque membre de notre staff joue un rôle crucial pour faire du Parc FC une association de football de premier plan. Nous sommes fiers de l’équipe que nous avons constituée et nous sommes impatients de vous voir nous rejoindre pour la saison 2024-2025 !</p>
    </Col>
   
    <h1 style="margin-top: 80px;">Liste des Coachs</h1>
      <Table bordered>
        <thead>
          <tr>
          <th>Nom du coach</th>
		      <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <!-- {#each listeEquipeCoach as equipeCoach} -->
          <tr>
          <td></td>
          <td></td>
    
          <!-- <td><a href="/Fiche_equipes?id_equipe={equipeCoach.id}&id_categorie={equipeCoach.id_categorie}" >Effectif</a></td> -->
          <!-- <td><Button on:click={()=>toggleSuppression(equipeCoach.id, equipeCoach.id_categorie)} style="border:0px;background-color:transparent;color:red;text-decoration:underline;margin:0 auto;padding:0 auto;">supprimer</Button></td> -->
          </tr>
         <!-- {/each} -->
        </tbody>
        </Table>
  </CardBody>
 
    
 
 
  

